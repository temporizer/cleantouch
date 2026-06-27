<x-admin-layout title="Settings">
    <div class="max-w-2xl">
        <div class="card p-6">
            <form action="{{ route('admin.settings.update') }}" method="POST">
                @csrf @method('PUT')

                <div class="flex items-center justify-between py-4">
                    <div class="pr-4">
                        <h3 class="font-heading font-semibold text-surface-900 dark:text-white">Maintenance Mode</h3>
                        <p class="text-sm text-surface-500 dark:text-surface-400 mt-0.5">When enabled, visitors will see a maintenance page instead of the site.</p>
                    </div>
                    <label class="relative inline-flex items-center cursor-pointer flex-shrink-0">
                        <input type="hidden" name="maintenance_mode" value="0">
                        <input type="checkbox" name="maintenance_mode" value="1" {{ \App\Models\Setting::get('maintenance_mode') === 'true' ? 'checked' : '' }} class="sr-only peer">
                        <div class="w-11 h-6 bg-surface-200 dark:bg-surface-700 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-primary-500/20 rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-surface-300 dark:after:border-surface-600 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-primary-600"></div>
                    </label>
                </div>

                <div class="divider"></div>

                <div class="flex items-center justify-between py-4">
                    <div class="pr-4">
                        <h3 class="font-heading font-semibold text-surface-900 dark:text-white">Public Registration</h3>
                        <p class="text-sm text-surface-500 dark:text-surface-400 mt-0.5">When disabled, users will be redirected to login and cannot create new accounts.</p>
                    </div>
                    <label class="relative inline-flex items-center cursor-pointer flex-shrink-0">
                        <input type="hidden" name="registration_enabled" value="0">
                        <input type="checkbox" name="registration_enabled" value="1" {{ \App\Models\Setting::get('registration_enabled') !== 'false' ? 'checked' : '' }} class="sr-only peer">
                        <div class="w-11 h-6 bg-surface-200 dark:bg-surface-700 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-primary-500/20 rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-surface-300 dark:after:border-surface-600 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-primary-600"></div>
                    </label>
                </div>

                <div class="divider"></div>

                <div class="py-4">
                    <h3 class="font-heading font-semibold text-surface-900 dark:text-white">Google Analytics</h3>
                    <p class="text-sm text-surface-500 dark:text-surface-400 mt-0.5">Optional — paste your G-XXXXXXXXXX tracking ID to enable site-wide analytics.</p>
                    <div class="mt-2">
                        <input type="text" name="google_analytics_id" value="{{ \App\Models\Setting::get('google_analytics_id') }}" placeholder="G-XXXXXXXXXX" class="w-full px-3 py-2 border border-surface-300 dark:border-surface-600 rounded bg-white dark:bg-surface-800 text-surface-900 dark:text-white text-sm focus:ring-2 focus:ring-primary-500/20 focus:border-primary-500">
                    </div>
                </div>

                <div class="divider"></div>

                <div class="flex justify-end">
                    <button type="submit" class="btn btn-primary">Save Settings</button>
                </div>
            </form>
        </div>
    </div>
</x-admin-layout>
