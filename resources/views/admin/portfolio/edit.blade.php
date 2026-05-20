<x-admin-layout title="Edit Portfolio Item">
    <div class="max-w-2xl">
        <div class="card p-6">
            <form action="{{ route('admin.portfolio.update', $portfolioItem) }}" method="POST" enctype="multipart/form-data" class="space-y-5">
                @csrf @method('PUT')

                <div class="space-y-1.5">
                    <label class="text-sm font-medium text-surface-700 dark:text-surface-300">Title</label>
                    <input type="text" name="title" value="{{ old('title', $portfolioItem->title) }}" required class="input">
                    @error('title') <p class="mt-1 text-sm text-red-500">{{ $message }}</p> @enderror
                </div>

                <div class="space-y-1.5">
                    <label class="text-sm font-medium text-surface-700 dark:text-surface-300">Description</label>
                    <textarea name="description" rows="3" class="textarea">{{ old('description', $portfolioItem->description) }}</textarea>
                </div>

                <div class="space-y-1.5">
                    <label class="text-sm font-medium text-surface-700 dark:text-surface-300">Content</label>
                    <textarea name="content" rows="8" class="textarea">{{ old('content', $portfolioItem->content) }}</textarea>
                </div>

                <div class="space-y-1.5">
                    <label class="text-sm font-medium text-surface-700 dark:text-surface-300">Category</label>
                    <select name="category_id" class="select">
                        <option value="">None</option>
                        @foreach($categories as $cat)
                        <option value="{{ $cat->id }}" {{ old('category_id', $portfolioItem->category_id) == $cat->id ? 'selected' : '' }}>{{ $cat->name }}</option>
                        @endforeach
                    </select>
                </div>

                @if($portfolioItem->thumbnail)
                <div>
                    <label class="block text-sm font-medium text-surface-700 dark:text-surface-300 mb-2">Current Thumbnail</label>
                    <img src="{{ asset('storage/' . $portfolioItem->thumbnail) }}" alt="" class="max-w-xs rounded-xl border border-surface-200 dark:border-surface-700">
                </div>
                @endif

                <div class="space-y-1.5">
                    <label class="text-sm font-medium text-surface-700 dark:text-surface-300">New Thumbnail</label>
                    <input type="file" name="thumbnail" accept="image/*" class="input py-1.5">
                </div>

                <label class="flex items-center gap-3 cursor-pointer">
                    <input type="hidden" name="is_published" value="0">
                    <input type="checkbox" name="is_published" value="1" {{ old('is_published', $portfolioItem->is_published) ? 'checked' : '' }} class="w-4 h-4 rounded border-surface-300 dark:border-surface-600 text-primary-600 focus:ring-primary-500">
                    <span class="text-sm font-medium text-surface-700 dark:text-surface-300">Published</span>
                </label>

                <div class="flex gap-3 pt-2">
                    <button type="submit" class="btn btn-primary">Update Portfolio Item</button>
                    <a href="{{ route('admin.portfolio.index') }}" class="btn btn-secondary">Cancel</a>
                </div>
            </form>
        </div>
    </div>
</x-admin-layout>
