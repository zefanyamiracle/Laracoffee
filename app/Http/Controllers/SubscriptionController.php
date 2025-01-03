<?php

namespace App\Http\Controllers;

use App\Models\Subscriber;
use Illuminate\Http\Request;

class SubscriptionController extends Controller
{
    public function subscribe(Request $request)
    {
        // Validate email
        $request->validate([
            'email' => 'required|email|unique:subscribers,email',
        ]);

        // Store the email in the subscribers table
        Subscriber::create([
            'email' => $request->email,
        ]);

        // Send confirmation email or return a success response
        return back()->with('success', 'Terima kasih telah berlangganan!');
    }
}