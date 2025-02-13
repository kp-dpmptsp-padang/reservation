<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;
use App\Console\Commands\UpdateVisitStatus;

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote');

// Register the UpdateVisitStatus command
Artisan::command('visits:update-status', function () {
    $this->call(UpdateVisitStatus::class);
})->describe('Update the status of visits based on the current date');

// Schedule the command to run daily
Artisan::command('schedule:run', function () {
    Artisan::call('visits:update-status');
})->describe('Run the scheduled commands');