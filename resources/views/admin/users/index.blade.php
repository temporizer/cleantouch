<x-admin-layout title="Users">
    <div class="flex justify-between items-center mb-6">
        <div>
            <h2 class="text-xl font-heading font-semibold text-surface-900 dark:text-white">Users</h2>
            <p class="text-sm text-surface-500 dark:text-surface-400 mt-0.5">Manage user accounts</p>
        </div>
        <a href="{{ route('admin.users.create') }}" class="btn btn-primary">
            <svg class="w-4 h-4 mr-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
            Add User
        </a>
    </div>

    <div class="table-wrap">
        <table>
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Created</th>
                    <th class="text-right">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($users as $user)
                <tr class="{{ $user->trashed() ? 'opacity-60' : '' }}">
                    <td class="font-medium text-surface-900 dark:text-white">
                        {{ $user->name }}
                        @if($user->trashed())
                        <span class="badge badge-default ml-2">Deleted</span>
                        @endif
                    </td>
                    <td class="text-surface-500 dark:text-surface-400">{{ $user->email }}</td>
                    <td><span class="badge badge-primary">{{ $user->roles->pluck('name')->join(', ') }}</span></td>
                    <td class="text-surface-400 dark:text-surface-500">{{ $user->created_at->format('M j, Y') }}</td>
                    <td class="text-right">
                        <a href="{{ route('admin.users.edit', $user) }}" class="text-sm text-primary-600 dark:text-primary-400 hover:text-primary-700 dark:hover:text-primary-300 font-medium px-3 py-1.5 rounded-lg hover:bg-primary-50 dark:hover:bg-primary-950/50 transition-all">Edit</a>
                        @if($user->trashed())
                        <form action="{{ route('admin.users.restore', $user) }}" method="POST" class="inline">
                            @csrf
                            <button type="submit" class="text-sm text-emerald-600 dark:text-emerald-400 hover:text-emerald-700 dark:hover:text-emerald-300 font-medium px-3 py-1.5 rounded-lg hover:bg-emerald-50 dark:hover:bg-emerald-950/50 transition-all">Restore</button>
                        </form>
                        <form action="{{ route('admin.users.force-destroy', $user) }}" method="POST" class="inline" onsubmit="return confirm('Permanently delete this user? This cannot be undone.')">
                            @csrf @method('DELETE')
                            <button type="submit" class="text-sm text-red-600 dark:text-red-400 hover:text-red-700 dark:hover:text-red-300 font-medium px-3 py-1.5 rounded-lg hover:bg-red-50 dark:hover:bg-red-950/50 transition-all">Delete Forever</button>
                        </form>
                        @elseif($user->id !== auth()->id())
                        <form action="{{ route('admin.users.destroy', $user) }}" method="POST" class="inline" onsubmit="return confirm('Deactivate this user?')">
                            @csrf @method('DELETE')
                            <button type="submit" class="text-sm text-accent-600 dark:text-accent-400 hover:text-accent-700 dark:hover:text-accent-300 font-medium px-3 py-1.5 rounded-lg hover:bg-accent-50 dark:hover:bg-accent-950/50 transition-all">Deactivate</button>
                        </form>
                        @endif
                    </td>
                </tr>
                @empty
                <tr><td colspan="5" class="px-6 py-12 text-center text-surface-500 dark:text-surface-400">No users yet.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
</x-admin-layout>
