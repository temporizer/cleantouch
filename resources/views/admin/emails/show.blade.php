<x-admin-layout title="Message from {{ $message->name }}">
    <div class="max-w-4xl">
        <div class="card p-6">
            <dl class="grid grid-cols-1 sm:grid-cols-2 gap-6 mb-6">
                <div>
                    <dt class="text-xs font-medium text-surface-400 dark:text-surface-500 uppercase tracking-wider mb-1">From</dt>
                    <dd class="text-surface-900 dark:text-white font-medium">{{ $message->name }} <span class="text-surface-400 dark:text-surface-500 font-normal">({{ $message->email }})</span></dd>
                </div>
                <div>
                    <dt class="text-xs font-medium text-surface-400 dark:text-surface-500 uppercase tracking-wider mb-1">Date</dt>
                    <dd class="text-surface-700 dark:text-surface-300">{{ $message->created_at->format('F j, Y \a\t g:i A') }}</dd>
                </div>
                <div>
                    <dt class="text-xs font-medium text-surface-400 dark:text-surface-500 uppercase tracking-wider mb-1">Subject</dt>
                    <dd class="text-surface-700 dark:text-surface-300">{{ $message->subject ?? '-' }}</dd>
                </div>
                <div>
                    <dt class="text-xs font-medium text-surface-400 dark:text-surface-500 uppercase tracking-wider mb-1">Status</dt>
                    <dd>
                        @if($message->trashed())
                        <span class="badge badge-default">Deleted</span>
                        @elseif($message->is_read)
                        <span class="badge badge-default">Read</span>
                        @else
                        <span class="badge badge-warning">Unread</span>
                        @endif
                    </dd>
                </div>
            </dl>

            <div class="divider"></div>

            <div class="prose prose-surface dark:prose-invert max-w-none">
                {!! nl2br(e($message->message)) !!}
            </div>

            <div class="mt-8 pt-6 border-t border-surface-200 dark:border-surface-700 flex items-center justify-between">
                <a href="{{ route('admin.emails.index') }}" class="inline-flex items-center text-sm font-medium text-primary-600 dark:text-primary-400 hover:text-primary-700 dark:hover:text-primary-300 transition-colors">
                    <svg class="w-4 h-4 mr-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/></svg>
                    Back to messages
                </a>
                <div class="flex items-center gap-2">
                    @if($message->trashed())
                    <form action="{{ route('admin.emails.restore', $message) }}" method="POST">
                        @csrf
                        <button type="submit" class="btn-sm inline-flex items-center gap-1.5 rounded-lg px-3 py-1.5 bg-emerald-50 dark:bg-emerald-950/50 text-emerald-600 dark:text-emerald-400 hover:bg-emerald-100 dark:hover:bg-emerald-950 transition-all font-medium">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"/></svg>
                            Restore
                        </button>
                    </form>
                    <form action="{{ route('admin.emails.force-destroy', $message) }}" method="POST" onsubmit="return confirm('Permanently delete this message? This cannot be undone.')">
                        @csrf @method('DELETE')
                        <button type="submit" class="btn-sm inline-flex items-center gap-1.5 rounded-lg px-3 py-1.5 bg-red-50 dark:bg-red-950/50 text-red-600 dark:text-red-400 hover:bg-red-100 dark:hover:bg-red-950 transition-all font-medium">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
                            Delete Forever
                        </button>
                    </form>
                    @else
                    <form action="{{ route('admin.emails.destroy', $message) }}" method="POST" onsubmit="return confirm('Delete this message?')">
                        @csrf @method('DELETE')
                        <button type="submit" class="btn-sm inline-flex items-center gap-1.5 rounded-lg px-3 py-1.5 bg-accent-50 dark:bg-accent-950/50 text-accent-600 dark:text-accent-400 hover:bg-accent-100 dark:hover:bg-accent-950 transition-all font-medium">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
                            Delete
                        </button>
                    </form>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-admin-layout>
