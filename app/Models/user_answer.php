<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserAnswer extends Model
{
    // The table name (if you want to define a custom name)
    protected $table = 'user_answers';

    // The attributes that are mass assignable
    protected $fillable = ['user_id', 'question_id', 'answer_text'];

    /**
     * Define the relationship between UserAnswer and User.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Define the relationship between UserAnswer and Question.
     */
    public function question()
    {
        return $this->belongsTo(Question::class);
    }
}
