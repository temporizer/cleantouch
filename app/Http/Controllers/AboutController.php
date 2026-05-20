<?php

namespace App\Http\Controllers;

use App\Models\Setting;

class AboutController extends Controller
{
    public function index()
    {
        if (Setting::get('maintenance_mode') === 'true') {
            return redirect('/');
        }

        $stats = [
            'years' => '11+',
            'homes' => '5000+',
            'eco' => '100%',
        ];

        return view('about', compact('stats'));
    }
}
