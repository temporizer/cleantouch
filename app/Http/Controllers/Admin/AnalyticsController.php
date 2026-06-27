<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PageView;
use Illuminate\Http\Request;

class AnalyticsController extends Controller
{
    public function index(Request $request)
    {
        $includeBots = $request->boolean('include_bots');
        $showFullIps = $request->boolean('show_ips');

        $baseQuery = PageView::when(!$includeBots, fn($q) => $q->humans());

        $stats = [
            'total' => (clone $baseQuery)->count(),
            'today' => (clone $baseQuery)->today()->count(),
            'week' => (clone $baseQuery)->thisWeek()->count(),
            'month' => (clone $baseQuery)->thisMonth()->count(),
        ];

        $topPages = (clone $baseQuery)
            ->selectRaw('url, count(*) as visits')
            ->groupBy('url')
            ->orderByDesc('visits')
            ->limit(10)
            ->get();

        $dailyViews = (clone $baseQuery)
            ->selectRaw("date(visited_at) as date, count(*) as count")
            ->where('visited_at', '>=', now()->subDays(30))
            ->groupBy('date')
            ->orderBy('date')
            ->pluck('count', 'date');

        $dates = collect();
        $counts = collect();
        $now = now()->startOfDay();

        for ($i = 29; $i >= 0; $i--) {
            $date = $now->copy()->subDays($i)->format('Y-m-d');
            $dates->push($now->copy()->subDays($i)->format('M j'));
            $counts->push($dailyViews->get($date, 0));
        }

        if ($showFullIps) {
            $recentVisitors = (clone $baseQuery)
                ->orderByDesc('visited_at')
                ->limit(20)
                ->get();
        } else {
            $recentVisitors = (clone $baseQuery)
                ->orderByDesc('visited_at')
                ->limit(20)
                ->get()
                ->map(function ($view) {
                    $view->ip = PageView::maskIp($view->ip);
                    return $view;
                });
        }

        return view('admin.analytics.index', compact(
            'stats', 'topPages', 'dates', 'counts',
            'includeBots', 'showFullIps', 'recentVisitors'
        ));
    }
}
