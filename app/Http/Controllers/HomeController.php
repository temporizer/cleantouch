<?php

namespace App\Http\Controllers;

use App\Models\Setting;

class HomeController extends Controller
{
    public function index()
    {
        if (Setting::get('maintenance_mode') === 'true') {
            return view('maintenance');
        }

        return view('home');
    }
}
