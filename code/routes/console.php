<?php

use App\Services\EmailService;
use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote')->hourly();

Artisan::command('app:parse-email', function () {
	$this->comment('Parsing email...');
	$emailService = new EmailService;
	$emailService->parseEmail();
	$this->comment('Email parsed.');
})->purpose('Parse email')->everyMinute();
