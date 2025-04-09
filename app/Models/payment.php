<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array<string>
     */
    protected $fillable = [
        'user_id',
        'payment_id',
        'sender_number', // mobile_number এর পরিবর্তে sender_number
    ];

    /**
     * Get the user that owns the payment.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the mock test associated with the payment.
     */
    public function mockTest()
    {
        return $this->hasOne(MockTest::class);
    }
}