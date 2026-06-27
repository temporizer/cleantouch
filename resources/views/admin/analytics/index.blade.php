<x-admin-layout title="Analytics">
    <div class="space-y-6">
        <!-- Filters -->
        <div class="flex items-center justify-between">
            <div class="flex items-center gap-3">
                <a href="{{ request()->fullUrlWithQuery(['include_bots' => $includeBots ? 0 : 1]) }}"
                   class="px-3 py-1.5 text-sm font-zine-display tracking-wider border rounded transition-all duration-200 
                   {{ $includeBots ? 'bg-zine-yellow text-zine-black border-zine-yellow' : 'bg-white/10 text-white/60 border-white/20 hover:text-white hover:border-white/40' }}">
                    🤖 {{ $includeBots ? 'Hiding Bots' : 'Show Bots' }}
                </a>
                <a href="{{ request()->fullUrlWithQuery(['show_ips' => $showFullIps ? 0 : 1]) }}"
                   class="px-3 py-1.5 text-sm font-zine-display tracking-wider border rounded transition-all duration-200 
                   {{ $showFullIps ? 'bg-zine-green text-zine-black border-zine-green' : 'bg-white/10 text-white/60 border-white/20 hover:text-white hover:border-white/40' }}">
                    👁️ {{ $showFullIps ? 'Masking IPs' : 'Show Full IPs' }}
                </a>
            </div>
        </div>

        <!-- Stats Cards -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-5">
            <div class="card p-5">
                <div class="text-3xl font-bold text-surface-900 dark:text-white">{{ number_format($stats['total']) }}</div>
                <div class="text-sm text-surface-500 dark:text-surface-400 mt-0.5">Total Page Views</div>
            </div>
            <div class="card p-5">
                <div class="text-3xl font-bold text-surface-900 dark:text-white">{{ number_format($stats['today']) }}</div>
                <div class="text-sm text-surface-500 dark:text-surface-400 mt-0.5">Today</div>
            </div>
            <div class="card p-5">
                <div class="text-3xl font-bold text-surface-900 dark:text-white">{{ number_format($stats['week']) }}</div>
                <div class="text-sm text-surface-500 dark:text-surface-400 mt-0.5">This Week</div>
            </div>
            <div class="card p-5">
                <div class="text-3xl font-bold text-surface-900 dark:text-white">{{ number_format($stats['month']) }}</div>
                <div class="text-sm text-surface-500 dark:text-surface-400 mt-0.5">This Month</div>
            </div>
        </div>

        <!-- Chart -->
        <div class="card p-6">
            <h3 class="font-heading font-semibold text-surface-900 dark:text-white mb-4">Daily Views (30 Days)</h3>
            <div class="relative" style="height: 300px;">
                <canvas id="viewsChart"></canvas>
            </div>
        </div>

        <!-- Top Pages -->
        <div class="card overflow-hidden">
            <div class="px-6 py-4 border-b border-surface-200 dark:border-surface-700">
                <h3 class="font-heading font-semibold text-surface-900 dark:text-white">Top Pages</h3>
            </div>
            <table class="min-w-full divide-y divide-surface-200 dark:divide-surface-700">
                <thead class="bg-surface-50 dark:bg-surface-800/50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-surface-500 dark:text-surface-400 uppercase tracking-wider">Page</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-surface-500 dark:text-surface-400 uppercase tracking-wider">Visits</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-surface-500 dark:text-surface-400 uppercase tracking-wider">% of Total</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-surface-200 dark:divide-surface-700">
                    @forelse($topPages as $page)
                    <tr class="hover:bg-surface-50/50 dark:hover:bg-surface-800/50 transition-colors">
                        <td class="px-6 py-4 text-sm font-medium text-surface-900 dark:text-white">/{{ $page->url }}</td>
                        <td class="px-6 py-4 text-sm text-surface-500 dark:text-surface-400">{{ number_format($page->visits) }}</td>
                        <td class="px-6 py-4 text-sm text-surface-500 dark:text-surface-400">
                            @if($stats['total'] > 0)
                                {{ round(($page->visits / $stats['total']) * 100, 1) }}%
                            @else
                                0%
                            @endif
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="3" class="px-6 py-8 text-center text-sm text-surface-400">No page views recorded yet.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <!-- Recent Visitors -->
        <div class="card overflow-hidden">
            <div class="px-6 py-4 border-b border-surface-200 dark:border-surface-700">
                <h3 class="font-heading font-semibold text-surface-900 dark:text-white">Recent Visitors</h3>
            </div>
            <table class="min-w-full divide-y divide-surface-200 dark:divide-surface-700">
                <thead class="bg-surface-50 dark:bg-surface-800/50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-surface-500 dark:text-surface-400 uppercase tracking-wider">Page</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-surface-500 dark:text-surface-400 uppercase tracking-wider">IP</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-surface-500 dark:text-surface-400 uppercase tracking-wider">Bot</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-surface-500 dark:text-surface-400 uppercase tracking-wider">Visited</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-surface-200 dark:divide-surface-700">
                    @forelse($recentVisitors as $visitor)
                    <tr class="hover:bg-surface-50/50 dark:hover:bg-surface-800/50 transition-colors">
                        <td class="px-6 py-4 text-sm text-surface-900 dark:text-white">/{{ $visitor->url }}</td>
                        <td class="px-6 py-4 text-sm font-mono text-surface-500 dark:text-surface-400">{{ $visitor->ip ?? '-' }}</td>
                        <td class="px-6 py-4 text-sm">
                            @if($visitor->is_bot)
                                <span class="text-xs bg-zine-yellow/20 text-zine-yellow px-2 py-0.5 rounded font-zine-display">BOT</span>
                            @else
                                <span class="text-xs text-surface-400">-</span>
                            @endif
                        </td>
                        <td class="px-6 py-4 text-sm text-surface-400">{{ $visitor->visited_at->diffForHumans() }}</td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="4" class="px-6 py-8 text-center text-sm text-surface-400">No visitors recorded yet.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    @push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/chart.js@4"></script>
    <script>
    document.addEventListener('DOMContentLoaded', function () {
        const ctx = document.getElementById('viewsChart').getContext('2d');
        new Chart(ctx, {
            type: 'line',
            data: {
                labels: @json($dates),
                datasets: [{
                    label: 'Page Views',
                    data: @json($counts),
                    borderColor: '#22c55e',
                    backgroundColor: 'rgba(34, 197, 94, 0.1)',
                    borderWidth: 2,
                    fill: true,
                    tension: 0.3,
                    pointRadius: 3,
                    pointBackgroundColor: '#22c55e',
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: { display: false }
                },
                scales: {
                    y: {
                        beginAtZero: true,
                        ticks: {
                            precision: 0,
                            color: '#94a3b8',
                        },
                        grid: {
                            color: 'rgba(148, 163, 184, 0.1)',
                        }
                    },
                    x: {
                        ticks: {
                            maxTicksLimit: 10,
                            color: '#94a3b8',
                        },
                        grid: {
                            display: false,
                        }
                    }
                }
            }
        });
    });
    </script>
    @endpush
</x-admin-layout>
