<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ContactMessage;
use App\Models\PageView;
use App\Models\PortfolioItem;
use App\Models\User;

class DashboardController extends Controller
{
    public function index()
    {
        $stats = [
            'portfolio_count' => PortfolioItem::count(),
            'published_count' => PortfolioItem::where('is_published', true)->count(),
            'views_today' => PageView::today()->humans()->count(),
            'users_count' => User::count(),
            'messages_unread' => ContactMessage::unread()->count(),
        ];

        $recentMessages = ContactMessage::recent(10)->get();

        return view('admin.dashboard', compact('stats', 'recentMessages'));
    }
}
