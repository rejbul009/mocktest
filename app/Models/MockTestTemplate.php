<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MockTestTemplate extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    // Define the relationship: A mock test has many users
    public function users()
    {
        return $this->belongsToMany(User::class, 'mock_test_user', 'mock_test_template_id', 'user_id');
    }
    public function questions()
    {
        return $this->hasMany(Question::class);
    }
}
    

