<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PageView;
use App\Models\Setting;
use Illuminate\Http\Request;

class AnalyticsController extends Controller
{
    public function index(Request $request)
    {
        $includeBots = $request->boolean('include_bots');
        $showFullIps = $request->boolean('show_ips');
        $startDate = $request->input('start_date');
        $endDate = $request->input('end_date');
        $urlQuery = $request->input('url_query');
        $hiddenIps = json_decode(Setting::get('hidden_ips', '[]'), true) ?? [];

        $baseQuery = PageView::whereNotIn('ip', $hiddenIps)
            ->where('ip', 'not like', '127.0%')
            ->when(!$includeBots, fn($q) => $q->humans());

        if ($startDate) {
            $baseQuery->where('visited_at', '>=', $startDate);
        }

        if ($endDate) {
            $baseQuery->where('visited_at', '<=', $endDate . ' 23:59:59');
        }

        if ($urlQuery) {
            $baseQuery->where('url', 'like', '%' . $urlQuery . '%');
        }

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
            ->paginate(25, ['*'], 'top_page')
            ->withQueryString();

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

        $recentVisitorsQuery = (clone $baseQuery)->orderByDesc('visited_at');

        if ($showFullIps) {
            $recentVisitors = $recentVisitorsQuery->paginate(50, ['*'], 'visitors_page')
                ->withQueryString();
        } else {
            $recentVisitors = $recentVisitorsQuery->paginate(50, ['*'], 'visitors_page')
                ->withQueryString()
                ->through(function ($view) {
                    $view->ip = PageView::maskIp($view->ip);
                    return $view;
                });
        }

        return view('admin.analytics.index', compact(
            'stats', 'topPages', 'dates', 'counts',
            'includeBots', 'showFullIps', 'recentVisitors',
            'startDate', 'endDate', 'urlQuery', 'hiddenIps'
        ));
    }

    public function hideIp(Request $request)
    {
        $ip = $request->input('ip');
        if (!$ip) {
            return back();
        }

        $hiddenIps = json_decode(Setting::get('hidden_ips', '[]'), true) ?? [];
        if (!in_array($ip, $hiddenIps)) {
            $hiddenIps[] = $ip;
            Setting::set('hidden_ips', json_encode($hiddenIps));
        }

        return back();
    }

    public function unhideIp(Request $request)
    {
        $ip = $request->input('ip');
        if (!$ip) {
            return back();
        }

        $hiddenIps = json_decode(Setting::get('hidden_ips', '[]'), true) ?? [];
        $hiddenIps = array_values(array_filter($hiddenIps, fn($h) => $h !== $ip));
        Setting::set('hidden_ips', json_encode($hiddenIps));

        return back();
    }
}