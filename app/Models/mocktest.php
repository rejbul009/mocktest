<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MockTest extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array<string>
     */
    protected $fillable = [
        'user_id',
        'payment_id',
        'test_name',
        'score',
    ];

    /**
     * Get the user that owns the mock test.
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    /**
     * Get the payment associated with the mock test.
     */
    public function payment()
    {
        return $this->belongsTo(Payment::class, 'payment_id');
    }

    /**
     * Optionally, you can add custom logic to get the full result of the test
     * or other custom attributes.
     */

    /**
     * Get the formatted score for the test.
     */
    public function getFormattedScoreAttribute()
    {
        return number_format($this->score, 2);  // Format the score to two decimal places.
    }
}
