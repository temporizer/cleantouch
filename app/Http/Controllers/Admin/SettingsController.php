<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PageView;
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
            'login_visible' => 'boolean',
            'two_factor_enabled' => 'boolean',
            'google_analytics_id' => 'nullable|string|max:50',
        ]);

        Setting::set('maintenance_mode', $request->boolean('maintenance_mode') ? 'true' : 'false');
        Setting::set('registration_enabled', $request->boolean('registration_enabled') ? 'true' : 'false');
        Setting::set('login_visible', $request->boolean('login_visible') ? 'true' : 'false');
        Setting::set('two_factor_enabled', $request->boolean('two_factor_enabled') ? 'true' : 'false');
        Setting::set('google_analytics_id', $request->input('google_analytics_id', ''));

        return back()->with('success', 'Settings updated.');
    }

    public function resetAnalytics(Request $request)
    {
        PageView::truncate();

        return back()->with('success', 'All analytics data has been cleared.');
    }
}
