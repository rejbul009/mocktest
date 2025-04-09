<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;

    // Include all the fields that are mass assignable
    protected $fillable = [
        'mock_test_template_id', 
        'question_text', 
        'option_a', 
        'option_b', 
        'option_c', 
        'option_d', 
        'correct_answer',
    ];

    /**
     * Define the inverse relationship: Each question belongs to a mock test template.
     */
    public function mockTestTemplate()
    {
        return $this->belongsTo(MockTestTemplate::class, 'mock_test_template_id');
    }

    /**
     * Get the answers associated with the question.
     */
    public function answers()
    {
        return $this->hasMany(Answer::class, 'question_id');
    }
}
