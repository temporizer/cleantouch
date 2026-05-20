<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ContactMessage;
use Illuminate\Http\Request;

class EmailController extends Controller
{
    public function index()
    {
        $messages = ContactMessage::withTrashed()->latest()->paginate(20);
        return view('admin.emails.index', compact('messages'));
    }

    public function show(ContactMessage $message)
    {
        if (!$message->is_read) {
            $message->update(['is_read' => true]);
        }

        return view('admin.emails.show', compact('message'));
    }

    public function destroy(ContactMessage $message)
    {
        $message->delete();

        return redirect()->route('admin.emails.index')
            ->with('success', 'Message deleted successfully.');
    }

    public function restore(ContactMessage $message)
    {
        $message->restore();

        return redirect()->route('admin.emails.index')
            ->with('success', 'Message restored successfully.');
    }

    public function forceDestroy(ContactMessage $message)
    {
        $message->forceDelete();

        return redirect()->route('admin.emails.index')
            ->with('success', 'Message permanently deleted.');
    }
}
