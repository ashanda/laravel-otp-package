<?php

use Illuminate\Support\Facades\Route;
use Geek\Otp\Http\Controllers\OtpController;

Route::post('send-otp', [OtpController::class, 'sendOtp']);
Route::post('verify-otp', [OtpController::class, 'verifyOtp']);
