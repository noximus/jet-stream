<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactFormMail;

class ContactController extends Controller
{
    public function submit(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'message' => 'required|string',
        ]);

        // Send email
        Mail::to('your-email@example.com')->send(new ContactFormMail($validated));

        // Redirect back with success message
        return back()->with('success', 'Thank you for your message. We\'ll be in touch soon!');
    }
}
