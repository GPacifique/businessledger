<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Schedule;

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote');

// Schedule subscription processing to run daily at 8:00 AM
Schedule::command('subscriptions:process')
    ->dailyAt('08:00')
    ->withoutOverlapping()
    ->runInBackground()
    ->onOneServer();
