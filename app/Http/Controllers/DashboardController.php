<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        $mockTests = $user->mockTests; // ইউজারের সব মক টেস্ট

        return view('dashboard', compact('mockTests'));
    }
}