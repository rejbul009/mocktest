<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('questions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('mock_test_template_id');
            $table->text('question_text');
            $table->string('option_a'); // Option A
            $table->string('option_b'); // Option B
            $table->string('option_c'); // Option C
            $table->string('option_d'); // Option D
            $table->integer('correct_answer'); // Correct answer
            $table->timestamps();
        
            $table->foreign('mock_test_template_id')->references('id')->on('mock_test_templates');
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('questions');
    }
};
