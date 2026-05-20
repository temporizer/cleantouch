<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;

class SettingsController extends Controller
{
    public function edit()
    {
        return view('admin.settings.edit');
    }

    public function update(Request $request)
    {
        $request->validate([
            'maintenance_mode' => 'boolean',
            'registration_enabled' => 'boolean',
        ]);

        Setting::set('maintenance_mode', $request->boolean('maintenance_mode') ? 'true' : 'false');
        Setting::set('registration_enabled', $request->boolean('registration_enabled') ? 'true' : 'false');

        return back()->with('success', 'Settings updated.');
    }
}
