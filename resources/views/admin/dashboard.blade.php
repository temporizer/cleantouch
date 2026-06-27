<x-admin-layout title="Dashboard">
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-5 gap-5 mb-8">
        <div class="card p-5">
            <div class="flex items-center justify-between mb-2">
                <div class="w-11 h-11 bg-primary-50 dark:bg-primary-950/50 rounded-xl flex items-center justify-center">
                    <svg class="w-5 h-5 text-primary-600 dark:text-primary-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                </div>
                <span class="text-xs font-medium text-surface-400 bg-surface-50 dark:bg-surface-800 px-2 py-0.5 rounded-full">Total</span>
            </div>
            <div class="text-2xl font-bold text-surface-900 dark:text-white">{{ $stats['portfolio_count'] }}</div>
            <div class="text-sm text-surface-500 dark:text-surface-400 mt-0.5">Portfolio Items</div>
        </div>

        <div class="card p-5">
            <div class="flex items-center justify-between mb-2">
                <div class="w-11 h-11 bg-emerald-50 dark:bg-emerald-950/50 rounded-xl flex items-center justify-center">
                    <svg class="w-5 h-5 text-emerald-600 dark:text-emerald-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                </div>
                <span class="text-xs font-medium text-emerald-600 bg-emerald-50 dark:bg-emerald-950/50 dark:text-emerald-400 px-2 py-0.5 rounded-full">Published</span>
            </div>
            <div class="text-2xl font-bold text-surface-900 dark:text-white">{{ $stats['published_count'] }}</div>
            <div class="text-sm text-surface-500 dark:text-surface-400 mt-0.5">Published</div>
        </div>

        <div class="card p-5">
            <div class="flex items-center justify-between mb-2">
                <div class="w-11 h-11 bg-purple-50 dark:bg-purple-950/50 rounded-xl flex items-center justify-center">
                    <svg class="w-5 h-5 text-purple-600 dark:text-purple-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 13.125C3 12.504 3.504 12 4.125 12h2.25c.621 0 1.125.504 1.125 1.125v6.75C7.5 20.496 6.996 21 6.375 21h-2.25A1.125 1.125 0 013 19.875v-6.75zM9.75 8.625c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125v11.25c0 .621-.504 1.125-1.125 1.125h-2.25a1.125 1.125 0 01-1.125-1.125V8.625zM16.5 4.125c0-.621.504-1.125 1.125-1.125h2.25C20.496 3 21 3.504 21 4.125v15.75c0 .621-.504 1.125-1.125 1.125h-2.25a1.125 1.125 0 01-1.125-1.125V4.125z"/></svg>
                </div>
                <span class="text-xs font-medium text-purple-600 bg-purple-50 dark:bg-purple-950/50 dark:text-purple-400 px-2 py-0.5 rounded-full">Today</span>
            </div>
            <div class="text-2xl font-bold text-surface-900 dark:text-white">{{ number_format($stats['views_today']) }}</div>
            <div class="text-sm text-surface-500 dark:text-surface-400 mt-0.5">Page Views Today</div>
        </div>

        <div class="card p-5">
            <div class="flex items-center justify-between mb-2">
                <div class="w-11 h-11 bg-blue-50 dark:bg-blue-950/50 rounded-xl flex items-center justify-center">
                    <svg class="w-5 h-5 text-blue-600 dark:text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"/></svg>
                </div>
                <span class="text-xs font-medium text-blue-600 bg-blue-50 dark:bg-blue-950/50 dark:text-blue-400 px-2 py-0.5 rounded-full">Platform</span>
            </div>
            <div class="text-2xl font-bold text-surface-900 dark:text-white">{{ $stats['users_count'] }}</div>
            <div class="text-sm text-surface-500 dark:text-surface-400 mt-0.5">Users</div>
        </div>

        <div class="card p-5">
            <div class="flex items-center justify-between mb-2">
                <div class="w-11 h-11 bg-amber-50 dark:bg-amber-950/50 rounded-xl flex items-center justify-center">
                    <svg class="w-5 h-5 text-amber-600 dark:text-amber-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                </div>
                <span class="text-xs font-medium text-amber-600 bg-amber-50 dark:bg-amber-950/50 dark:text-amber-400 px-2 py-0.5 rounded-full">Unread</span>
            </div>
            <div class="text-2xl font-bold text-surface-900 dark:text-white">{{ $stats['messages_unread'] }}</div>
            <div class="text-sm text-surface-500 dark:text-surface-400 mt-0.5">Unread Messages</div>
        </div>
    </div>

    @if($recentMessages->isNotEmpty())
    <div class="card overflow-hidden">
        <div class="px-6 py-4 border-b border-surface-200 dark:border-surface-700 flex items-center justify-between">
            <h3 class="font-heading font-semibold text-surface-900 dark:text-white">Recent Messages</h3>
            <a href="{{ route('admin.emails.index') }}" class="text-sm text-primary-600 dark:text-primary-400 hover:underline">View all</a>
        </div>
        <table class="min-w-full divide-y divide-surface-200 dark:divide-surface-700">
            <thead class="bg-surface-50 dark:bg-surface-800/50">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-surface-500 dark:text-surface-400 uppercase tracking-wider">Name</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-surface-500 dark:text-surface-400 uppercase tracking-wider">Email</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-surface-500 dark:text-surface-400 uppercase tracking-wider">Subject</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-surface-500 dark:text-surface-400 uppercase tracking-wider">Date</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-surface-200 dark:divide-surface-700">
                @foreach($recentMessages as $msg)
                <tr class="{{ !$msg->is_read ? 'bg-primary-50/30 dark:bg-primary-950/20' : 'hover:bg-surface-50/50 dark:hover:bg-surface-800/50' }} transition-colors">
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-surface-900 dark:text-white">{{ $msg->name }}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-surface-500 dark:text-surface-400">{{ $msg->email }}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-surface-500 dark:text-surface-400">{{ $msg->subject ?? '-' }}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-surface-400 dark:text-surface-500">{{ $msg->created_at->format('M j, Y') }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    @endif
</x-admin-layout>
