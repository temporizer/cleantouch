<x-admin-layout title="Contact Messages">
    <div class="table-wrap">
        <table>
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Subject</th>
                    <th>Date</th>
                    <th>Status</th>
                    <th class="text-right"></th>
                </tr>
            </thead>
            <tbody>
                @forelse($messages as $msg)
                <tr class="{{ !$msg->is_read && !$msg->trashed() ? 'bg-primary-50/30 dark:bg-primary-950/20' : '' }} {{ $msg->trashed() ? 'opacity-60' : '' }}">
                    <td class="font-medium text-surface-900 dark:text-white">
                        {{ $msg->name }}
                        @if($msg->trashed())
                        <span class="badge badge-default ml-2">Deleted</span>
                        @endif
                    </td>
                    <td class="text-surface-500 dark:text-surface-400">{{ $msg->email }}</td>
                    <td class="text-surface-500 dark:text-surface-400">{{ $msg->phone ?? '-' }}</td>
                    <td class="text-surface-500 dark:text-surface-400">{{ Str::limit($msg->subject ?? '-', 40) }}</td>
                    <td class="text-surface-400 dark:text-surface-500 whitespace-nowrap">{{ $msg->created_at->format('M j, Y H:i') }}</td>
                    <td>
                        @if($msg->trashed())
                        <span class="badge badge-default">Deleted</span>
                        @elseif($msg->is_read)
                        <span class="badge badge-default">Read</span>
                        @else
                        <span class="badge badge-warning">Unread</span>
                        @endif
                    </td>
                    <td class="text-right">
                        <div class="flex items-center justify-end gap-2">
                            <a href="{{ route('admin.emails.show', $msg) }}" class="btn-ghost btn-sm inline-flex items-center gap-1.5 rounded-lg px-3 py-1.5">
                                View
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                            </a>
                            @if($msg->trashed())
                            <form action="{{ route('admin.emails.restore', $msg) }}" method="POST" class="inline">
                                @csrf
                                <button type="submit" class="text-sm text-emerald-600 dark:text-emerald-400 hover:text-emerald-700 dark:hover:text-emerald-300 font-medium px-3 py-1.5 rounded-lg hover:bg-emerald-50 dark:hover:bg-emerald-950/50 transition-all">Restore</button>
                            </form>
                            <form action="{{ route('admin.emails.force-destroy', $msg) }}" method="POST" class="inline" onsubmit="return confirm('Permanently delete this message? This cannot be undone.')">
                                @csrf @method('DELETE')
                                <button type="submit" class="text-sm text-red-600 dark:text-red-400 hover:text-red-700 dark:hover:text-red-300 font-medium px-3 py-1.5 rounded-lg hover:bg-red-50 dark:hover:bg-red-950/50 transition-all">Delete Forever</button>
                            </form>
                            @else
                            <form action="{{ route('admin.emails.destroy', $msg) }}" method="POST" class="inline" onsubmit="return confirm('Delete this message?')">
                                @csrf @method('DELETE')
                                <button type="submit" class="text-sm text-accent-600 dark:text-accent-400 hover:text-accent-700 dark:hover:text-accent-300 font-medium px-3 py-1.5 rounded-lg hover:bg-accent-50 dark:hover:bg-accent-950/50 transition-all">Delete</button>
                            </form>
                            @endif
                        </div>
                    </td>
                </tr>
                @empty
                <tr><td colspan="7" class="px-6 py-12 text-center text-surface-500 dark:text-surface-400">No messages yet.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="mt-4">
        {{ $messages->links() }}
    </div>
</x-admin-layout>
