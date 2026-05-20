<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\ContactMessage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:100',
            'email' => 'required|email|max:255',
            'subject' => 'nullable|string|max:255',
            'message' => 'required|string',
        ]);

        ContactMessage::create($validated);

        $subject = $validated['subject'] ?? 'New Contact Form Message';

        Mail::raw("From: {$validated['name']} ({$validated['email']})\nSubject: {$subject}\n\n{$validated['message']}", function ($mail) use ($validated, $subject) {
            $mail->to(config('mail.from.address'))
                ->subject($subject)
                ->replyTo($validated['email'], $validated['name']);
        });

        return response()->json(['message' => 'Message sent successfully']);
    }
}
