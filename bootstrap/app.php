<?php

function numberToWords($number) {
    $ones = array(
        0 => '', 1 => 'One', 2 => 'Two', 3 => 'Three', 4 => 'Four', 5 => 'Five',
        6 => 'Six', 7 => 'Seven', 8 => 'Eight', 9 => 'Nine', 10 => 'Ten',
        11 => 'Eleven', 12 => 'Twelve', 13 => 'Thirteen', 14 => 'Fourteen', 15 => 'Fifteen',
        16 => 'Sixteen', 17 => 'Seventeen', 18 => 'Eighteen', 19 => 'Nineteen'
    );

    $tens = array(
        2 => 'Twenty', 3 => 'Thirty', 4 => 'Forty', 5 => 'Fifty',
        6 => 'Sixty', 7 => 'Seventy', 8 => 'Eighty', 9 => 'Ninety'
    );

    if ($number == 0) {
        return 'Zero';
    }

    $words = '';

    // Handle Crores (10 million)
    if ($number >= 10000000) {
        $words .= numberToWords(floor($number / 10000000)) . ' Crore ';
        $number = $number % 10000000;
    }

    // Handle Lakhs (100 thousand)
    if ($number >= 100000) {
        $words .= numberToWords(floor($number / 100000)) . ' Lakh ';
        $number = $number % 100000;
    }

    // Handle Thousands
    if ($number >= 1000) {
        $words .= numberToWords(floor($number / 1000)) . ' Thousand ';
        $number = $number % 1000;
    }

    // Handle Hundreds
    if ($number >= 100) {
        $words .= numberToWords(floor($number / 100)) . ' Hundred ';
        $number = $number % 100;
    }

    // Handle Tens and Ones
    if ($number > 0) {
        if ($number < 20) {
            $words .= $ones[$number];
        } else {
            $words .= $tens[floor($number / 10)];
            if ($number % 10 > 0) {
                $words .= '-' . $ones[$number % 10];
            }
        }
    }

    return trim($words);
}

$app = new Illuminate\Foundation\Application(
    $_ENV['APP_BASE_PATH'] ?? dirname(__DIR__)
);

/*
|--------------------------------------------------------------------------
| Bind Important Interfaces
|--------------------------------------------------------------------------
|
| Next, we need to bind some important interfaces into the container so
| we will be able to resolve them when needed. The kernels serve the
| incoming requests to this application from both the web and CLI.
|
*/

$app->singleton(
    Illuminate\Contracts\Http\Kernel::class,
    App\Http\Kernel::class
);

$app->singleton(
    Illuminate\Contracts\Console\Kernel::class,
    App\Console\Kernel::class
);

$app->singleton(
    Illuminate\Contracts\Debug\ExceptionHandler::class,
    App\Exceptions\Handler::class
);

/*
|--------------------------------------------------------------------------
| Return The Application
|--------------------------------------------------------------------------
|
| This script returns the application instance. The instance is given to
| the calling script so we can separate the building of the instances
| from the actual running of the application and sending responses.
|
*/

return $app;
