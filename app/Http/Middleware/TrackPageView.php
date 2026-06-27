<?php

namespace App\Http\Middleware;

use App\Models\PageView;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class TrackPageView
{
    private const BOT_PATTERNS = '/bot|crawl|spider|scraper|curl|wget|facebookexternalhit|googlebot|bingbot|slurp|duckduckbot|baiduspider|yandexbot|twitterbot|whatsapp|telegrambot/i';

    public function handle(Request $request, Closure $next): Response
    {
        $response = $next($request);

        if (!$this->shouldTrack($request)) {
            return $response;
        }

        $userAgent = $request->userAgent() ?? '';

        PageView::create([
            'url' => $request->path(),
            'ip' => $request->ip(),
            'user_agent' => $userAgent,
            'referer' => $request->header('referer'),
            'is_bot' => (bool) preg_match(self::BOT_PATTERNS, $userAgent),
            'visited_at' => now(),
        ]);

        return $response;
    }

    private function shouldTrack(Request $request): bool
    {
        if (!$request->isMethod('GET')) {
            return false;
        }

        if ($request->ajax() || $request->prefetch()) {
            return false;
        }

        if (str_starts_with($request->path(), 'admin')) {
            return false;
        }

        if ($request->headers->has('Livewire')) {
            return false;
        }

        if (in_array($request->path(), ['livewire/update', '_debugbar/*', 'telescope/*', 'horizon/*'])) {
            return false;
        }

        return true;
    }
}
