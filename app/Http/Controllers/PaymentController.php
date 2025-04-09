<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function submit(Request $request)
    {
        // ফর্ম থেকে ডাটা ভ্যালি� Validেট করা
        $request->validate([
            'payment_id' => 'required|string',
            'sender_number' => 'required|string',
            'type' => 'required|in:mock-test,premium-class',
        ]);

        // পেমেন্ট ডাটা সেভ করা
        $payment = Payment::create([
            'user_id' => auth()->id(), // লগইন থাকা বাধ্যতামূলক
            'payment_id' => $request->payment_id,
            'sender_number' => $request->sender_number,
        ]);

        // টাইপ অনুযায়ী রিডাইরেক্ট
        if ($request->type === 'mock-test') {
            return redirect()->route('mock.test', ['payment_id' => $payment->id]);
        } elseif ($request->type === 'premium-class') {
            return redirect()->route('premium.class', ['payment_id' => $payment->id]);
        }

        // ডিফল্ট রিডাইরেক্ট
        return redirect()->route('welcome')->with('error', 'কিছু ভুল হয়েছে।');
    }
}