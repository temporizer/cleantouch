<?php

namespace App\Http\Controllers;

use App\Models\ContactMessage;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function index()
    {
        if (Setting::get('maintenance_mode') === 'true') {
            return redirect('/');
        }

        return view('contact');
    }

    public function store(Request $request)
    {
        if (Setting::get('maintenance_mode') === 'true') {
            return redirect('/');
        }

        $validated = $request->validate([
            'name' => 'required|string|max:100',
            'email' => 'required|email|max:255',
            'phone' => 'nullable|string|max:20',
            'subject' => 'nullable|string|max:255',
            'message' => 'required|string',
        ]);

        $message = ContactMessage::create($validated);

        $subject = $validated['subject'] ?? 'New Contact Form Message';

        Mail::raw("From: {$validated['name']} ({$validated['email']})\nSubject: {$subject}\n\n{$validated['message']}", function ($mail) use ($validated, $subject) {
            $mail->to(config('mail.from.address'))
                ->subject($subject)
                ->replyTo($validated['email'], $validated['name']);
        });

        return back()->with('success', 'Your message has been sent. Thank you!');
    }
}
