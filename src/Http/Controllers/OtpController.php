<?php

namespace Geek\Otp\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Geek\Otp\OtpService;

class OtpController extends Controller
{
    protected $otpService;

    public function __construct(OtpService $otpService)
    {
        $this->otpService = $otpService;
    }

    public function sendOtp(Request $request)
    {
        $request->validate([
            'phone_number' => 'required|string',
        ]);

        $result = $this->otpService->sendOtp($request->phone_number);

        return response()->json($result);
    }

    public function verifyOtp(Request $request)
    {
        $request->validate([
            'phone_number' => 'required|string',
            'otp' => 'required|string',
        ]);

        $result = $this->otpService->verifyOtp($request->phone_number, $request->otp);

        return response()->json($result);
    }
}
