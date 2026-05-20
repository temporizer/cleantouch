<x-admin-layout title="Portfolio">
    <div class="flex justify-between items-center mb-6">
        <div>
            <h2 class="text-xl font-heading font-semibold text-surface-900 dark:text-white">Portfolio Items</h2>
            <p class="text-sm text-surface-500 dark:text-surface-400 mt-0.5">Manage your portfolio projects</p>
        </div>
        <a href="{{ route('admin.portfolio.create') }}" class="btn btn-primary">
            <svg class="w-4 h-4 mr-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
            Add New
        </a>
    </div>

    <div class="table-wrap">
        <table>
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Category</th>
                    <th>Status</th>
                    <th class="text-right">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($items as $item)
                <tr class="{{ $item->trashed() ? 'opacity-60' : '' }}">
                    <td>
                        <div class="flex items-center gap-3">
                            @if($item->thumbnail)
                            <img src="{{ asset('storage/' . $item->thumbnail) }}" alt="" class="w-10 h-10 rounded-lg object-cover flex-shrink-0">
                            @else
                            <div class="w-10 h-10 rounded-lg bg-surface-100 dark:bg-surface-700 flex items-center justify-center flex-shrink-0">
                                <svg class="w-5 h-5 text-surface-300 dark:text-surface-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                            </div>
                            @endif
                            <span class="text-sm font-medium text-surface-900 dark:text-white">{{ $item->title }}</span>
                            @if($item->trashed())
                            <span class="badge badge-default">Deleted</span>
                            @endif
                        </div>
                    </td>
                    <td class="text-surface-500 dark:text-surface-400">{{ $item->category?->name ?? '-' }}</td>
                    <td>
                        @if($item->trashed())
                        <span class="badge badge-default">Deleted</span>
                        @elseif($item->is_published)
                        <span class="badge badge-success">Published</span>
                        @else
                        <span class="badge badge-default">Draft</span>
                        @endif
                    </td>
                    <td class="text-right">
                        <div class="flex items-center justify-end gap-2">
                            <a href="{{ route('admin.portfolio.edit', $item) }}" class="btn-ghost btn-sm inline-flex items-center gap-1.5 rounded-lg px-3 py-1.5">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/></svg>
                                Edit
                            </a>
                            @if($item->trashed())
                            <form action="{{ route('admin.portfolio.restore', $item) }}" method="POST" class="inline">
                                @csrf
                                <button type="submit" class="text-sm text-emerald-600 dark:text-emerald-400 hover:text-emerald-700 dark:hover:text-emerald-300 font-medium px-3 py-1.5 rounded-lg hover:bg-emerald-50 dark:hover:bg-emerald-950/50 transition-all">Restore</button>
                            </form>
                            <form action="{{ route('admin.portfolio.force-destroy', $item) }}" method="POST" class="inline" onsubmit="return confirm('Permanently delete this item? This cannot be undone.')">
                                @csrf @method('DELETE')
                                <button type="submit" class="text-sm text-red-600 dark:text-red-400 hover:text-red-700 dark:hover:text-red-300 font-medium px-3 py-1.5 rounded-lg hover:bg-red-50 dark:hover:bg-red-950/50 transition-all">Delete Forever</button>
                            </form>
                            @else
                            <form action="{{ route('admin.portfolio.destroy', $item) }}" method="POST" class="inline" onsubmit="return confirm('Delete this item?')">
                                @csrf @method('DELETE')
                                <button type="submit" class="text-sm text-accent-600 dark:text-accent-400 hover:text-accent-700 dark:hover:text-accent-300 font-medium px-3 py-1.5 rounded-lg hover:bg-accent-50 dark:hover:bg-accent-950/50 transition-all">Delete</button>
                            </form>
                            @endif
                        </div>
                    </td>
                </tr>
                @empty
                <tr><td colspan="4" class="px-6 py-12 text-center text-surface-500 dark:text-surface-400">No portfolio items yet. <a href="{{ route('admin.portfolio.create') }}" class="text-primary-600 dark:text-primary-400 hover:underline">Create one</a></td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
</x-admin-layout>
