<x-admin-layout title="Categories">
    <div class="card p-6 mb-6">
        <form action="{{ route('admin.categories.store') }}" method="POST" class="flex flex-col sm:flex-row gap-4 items-end">
            @csrf
            <div class="flex-1 w-full space-y-1.5">
                <label class="text-sm font-medium text-surface-700 dark:text-surface-300">Name</label>
                <input type="text" name="name" required placeholder="Category name" class="input">
            </div>
            <div class="flex-1 w-full space-y-1.5">
                <label class="text-sm font-medium text-surface-700 dark:text-surface-300">Description</label>
                <input type="text" name="description" placeholder="Optional" class="input">
            </div>
            <button type="submit" class="btn btn-primary flex-shrink-0">Add Category</button>
        </form>
    </div>

    <div class="table-wrap">
        <table>
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Slug</th>
                    <th>Items</th>
                    <th class="text-right">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($categories as $cat)
                <tr>
                    <td class="font-medium text-surface-900 dark:text-white">{{ $cat->name }}</td>
                    <td class="font-mono text-surface-500 dark:text-surface-400">{{ $cat->slug }}</td>
                    <td><span class="badge badge-default">{{ $cat->portfolio_items_count }}</span></td>
                    <td class="text-right">
                        <form action="{{ route('admin.categories.destroy', $cat) }}" method="POST" class="inline" onsubmit="return confirm('Delete this category?')">
                            @csrf @method('DELETE')
                            <button type="submit" class="text-sm text-accent-600 dark:text-accent-400 hover:text-accent-700 dark:hover:text-accent-300 font-medium px-3 py-1.5 rounded-lg hover:bg-accent-50 dark:hover:bg-accent-950/50 transition-all">Delete</button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr><td colspan="4" class="px-6 py-12 text-center text-surface-500 dark:text-surface-400">No categories yet.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
</x-admin-layout>
