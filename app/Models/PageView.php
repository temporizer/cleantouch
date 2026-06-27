<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PageView extends Model
{
    public $timestamps = false;

    protected $fillable = ['url', 'ip', 'user_agent', 'referer', 'is_bot', 'visited_at'];

    protected $casts = [
        'is_bot' => 'boolean',
        'visited_at' => 'datetime',
    ];

    public function scopeHumans($query)
    {
        return $query->where('is_bot', false);
    }

    public function scopeBots($query)
    {
        return $query->where('is_bot', true);
    }

    public function scopeToday($query)
    {
        return $query->whereDate('visited_at', today());
    }

    public function scopeThisWeek($query)
    {
        return $query->whereBetween('visited_at', [now()->startOfWeek(), now()]);
    }

    public function scopeThisMonth($query)
    {
        return $query->whereMonth('visited_at', now()->month)
            ->whereYear('visited_at', now()->year);
    }

    public static function maskIp(?string $ip): ?string
    {
        if (!$ip) {
            return null;
        }
        $lastDot = strrpos($ip, '.');
        if ($lastDot !== false) {
            return substr($ip, 0, $lastDot) . '.xxx';
        }
        return $ip;
    }
}
