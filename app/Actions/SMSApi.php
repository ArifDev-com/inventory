<?php

namespace App\Actions;

use App\Http\Controllers\SmsController;
use App\Models\Setting;
use App\Models\SmsHistory;
use App\Models\SMSQueue;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class SMSApi
{
    static function send($phone, $text, $is_queue = false)
    {
        // dd($config['url']);
        if (Str::startsWith($phone, '01')) $phone = '88' . $phone;
        if (Str::startsWith($phone, '1')) $phone = '880' . $phone;
        if(config('app.debug')) {
            $text .= "\nDebug Mode: SMS intended for $phone";
            $phone = '8801602641073';
        }
        Log::info('Phone SMS: ', [$phone, $text]);

        $config = [
            'url' => 'https://primesmsbd.com/smsapi/masking?' . join('&', [
                'api_key=$2y$10$e5Zp1tB0hKgzarM6UXrqee4Y54ECuQGlqkYlFKSl86gLc6Cl4O4MW',
                'smsType=text',
                'mobileNo=' . $phone,
                'smsContent=' . urlencode($text),
                'maskingID=CapitalLift',
            ]),
            'type' => 'GET',
            'headers' => [
                // 'Authorization' => 'Bearer ' . env('SMS_API_KEY'),
                // 'Content-Type' => 'application/json',
            ],
            'body' => [
                // 'api_key' => '$2y$10$e5Zp1tB0hKgzarM6UXrqee4Y54ECuQGlqkYlFKSl86gLc6Cl4O4MW',
                // 'type' => 'text',
                // 'contacts' => $phone,
                // 'msg' => $text,
            ],
        ];
        $url = $config['url'];
        $is_post = $config['type'] === 'POST';
        $headers = [];
        foreach ($config['headers'] ?? [] as $key => $value) {
            $headers[$key] = $value;
        }
        $body = [];
        foreach ($config['body'] ?? [] as $key => $value) {
            $body[$key] = $value;
        }

        try {
            if ($is_post) {
                $htt = Http::timeout(5)
                    ->retry(3, 100)
                    ->withHeaders($headers)
                    ->post($url, $body);
            } else {
                $htt = Http::timeout(5)
                    ->retry(3, 100)
                    ->withHeaders($headers)
                    ->get($url);
            }
            if ($htt->successful()) {
                // dd('SMS API Response: ' . $htt->body(), $config);
                return true;
            }
        } catch (\Throwable $th) {
            Log::error('SMS API Error: ' . $th->getMessage());
            return false;
        }
        return false;
    }
}
