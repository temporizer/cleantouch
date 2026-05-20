<x-admin-layout title="Create User">
    <div class="max-w-2xl">
        <div class="card p-6">
            <form action="{{ route('admin.users.store') }}" method="POST" class="space-y-5">
                @csrf

                <div class="space-y-1.5">
                    <label class="text-sm font-medium text-surface-700 dark:text-surface-300">Name</label>
                    <input type="text" name="name" value="{{ old('name') }}" required class="input">
                    @error('name') <p class="mt-1 text-sm text-red-500">{{ $message }}</p> @enderror
                </div>

                <div class="space-y-1.5">
                    <label class="text-sm font-medium text-surface-700 dark:text-surface-300">Email</label>
                    <input type="email" name="email" value="{{ old('email') }}" required class="input">
                    @error('email') <p class="mt-1 text-sm text-red-500">{{ $message }}</p> @enderror
                </div>

                <div class="space-y-1.5">
                    <label class="text-sm font-medium text-surface-700 dark:text-surface-300">Password</label>
                    <input type="password" name="password" required class="input">
                    @error('password') <p class="mt-1 text-sm text-red-500">{{ $message }}</p> @enderror
                </div>

                <div class="space-y-1.5">
                    <label class="text-sm font-medium text-surface-700 dark:text-surface-300">Confirm Password</label>
                    <input type="password" name="password_confirmation" required class="input">
                </div>

                <div class="space-y-1.5">
                    <label class="text-sm font-medium text-surface-700 dark:text-surface-300">Role</label>
                    <select name="role" class="select">
                        @foreach($roles as $role)
                        <option value="{{ $role->name }}">{{ $role->name }}</option>
                        @endforeach
                    </select>
                    @error('role') <p class="mt-1 text-sm text-red-500">{{ $message }}</p> @enderror
                </div>

                <div class="flex gap-3 pt-2">
                    <button type="submit" class="btn btn-primary">Create User</button>
                    <a href="{{ route('admin.users.index') }}" class="btn btn-secondary">Cancel</a>
                </div>
            </form>
        </div>
    </div>
</x-admin-layout>
