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
        $config = [
            'url' => 'https://api.smsgateway.com/send-sms',
            'type' => 'POST',
            'headers' => [
                'Authorization' => 'Bearer ' . env('SMS_API_KEY'),
                'Content-Type' => 'application/json',
            ],
            'body' => [],
        ];
        if (Str::startsWith($phone, '01')) $phone = '88' . $phone;
        if (Str::startsWith($phone, '1')) $phone = '880' . $phone;
        if(config('app.debug')) {
            $text .= "\nDebug Mode: SMS intended for $phone";
            $phone = '8801602641073';
        }
        Log::info('Phone SMS: ', [$phone, $text]);

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
                return true;
            }
        } catch (\Throwable $th) {
            return false;
        }
        return false;
    }
}