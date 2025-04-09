<?php

namespace App\Http\Controllers;

use App\Models\MockTestTemplate;
use App\Models\Question;
use App\Models\Payment;
use Illuminate\Http\Request;

class MockTestController extends Controller
{
    // Display the welcome page with Mock Test Templates
    public function showWelcomePage()
    {
        $templates = MockTestTemplate::all(); // Get all mock test templates
        return view('welcome', compact('templates'));
    }

    // Show the mock test questions for a selected template (after payment)
    public function showMockTestQuestions($templateId)
    {
        // Check if the user has paid for the mock test
        $payment = Payment::where('user_id', auth()->id())
                          ->where('template_id', $templateId)
                          ->first();

        if (!$payment) {
            // If the payment is not successful, redirect to the payment page
            return redirect()->route('mockTest.payment', $templateId);
        }

        // Fetch questions related to the mock test template
        $questions = Question::where('mock_test_template_id', $templateId)->get();
        return view('mocktest', compact('questions'));
    }

    // Handle test submission and calculate score
    public function submitMockTest(Request $request)
    {
        // Retrieve the answers submitted by the user
        $userAnswers = $request->input('answers');
        
        // Initialize score
        $score = 0;

        // Process each answer and compare it with the correct answer
        foreach ($userAnswers as $questionId => $answer) {
            $question = Question::find($questionId);
            if ($question && $question->correct_answer == $answer) {
                $score++; // Increment score for correct answers
            }
        }

        // Calculate the total number of questions
        $totalQuestions = Question::count();

        // Return the test result view with the score and total questions
        return view('testResult', compact('score', 'totalQuestions'));
    }

    // Show the payment modal for mock test
    public function showPaymentPage($templateId)
    {
        // Show the payment page for the selected template
        return view('payment', ['templateId' => $templateId]);
    }

    // Handle payment submission
    public function submitPayment(Request $request)
    {
        // Create a new payment record in the database
        $payment = new Payment();
        $payment->user_id = auth()->id();
        $payment->template_id = $request->input('template_id');
        $payment->transaction_id = $request->input('payment_id');
        $payment->sender_number = $request->input('sender_number');
        $payment->save();

        // Redirect to the mock test questions page after payment
        return redirect()->route('mockTest.showQuestions', $request->input('template_id'));
    }
}
