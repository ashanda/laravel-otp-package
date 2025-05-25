<?php

namespace Geek\Otp\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Otp extends Model
{
    protected $fillable = ['phone_number', 'otp', 'expires_at'];

    protected $dates = ['expires_at'];

    public function isExpired()
    {
        return $this->expires_at->lt(Carbon::now());
    }
}
