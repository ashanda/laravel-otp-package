<?php

namespace Geek\Otp;

use Geek\Otp\Models\Otp;
use Carbon\Carbon;

class OtpService
{
    protected $otpTTL = 1; // minutes

    public function generateOtp()
    {
        return rand(100000, 999999);
    }

    public function sendOtp($phoneNumber)
    {
        $existingOtp = Otp::where('phone_number', $phoneNumber)
            ->where('expires_at', '>', Carbon::now()->subMinute())
            ->first();

        if ($existingOtp) {
            return [
                'status' => false,
                'message' => 'OTP already sent. Please wait before requesting again.',
            ];
        }

        $otp = $this->generateOtp();

        Otp::updateOrCreate(
            ['phone_number' => $phoneNumber],
            [
                'otp' => $otp,
                'expires_at' => Carbon::now()->addMinutes($this->otpTTL),
            ]
        );

        // TODO: Integrate SMS provider here

        return [
            'status' => true,
            'message' => 'OTP sent successfully.',
            'otp' => $otp // For debugging/testing only
        ];
    }

    public function verifyOtp($phoneNumber, $otp)
    {
        $record = Otp::where('phone_number', $phoneNumber)
            ->where('otp', $otp)
            ->first();

        if (!$record) {
            return [
                'status' => false,
                'message' => 'Invalid OTP.',
            ];
        }

        if ($record->expires_at->lt(Carbon::now())) {
            return [
                'status' => false,
                'message' => 'OTP expired.',
            ];
        }

        $record->delete();

        return [
            'status' => true,
            'message' => 'OTP verified successfully.',
        ];
    }
}
