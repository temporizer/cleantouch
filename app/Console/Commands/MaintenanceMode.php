<?php

namespace App\Console\Commands;

use App\Models\Setting;
use Illuminate\Console\Command;

class MaintenanceMode extends Command
{
    protected $signature = 'maintenance {mode : on or off}';

    protected $description = 'Toggle maintenance mode on or off';

    public function handle()
    {
        $mode = $this->argument('mode');

        if (!in_array($mode, ['on', 'off'])) {
            $this->error('Usage: php artisan maintenance {on|off}');
            return 1;
        }

        $value = $mode === 'on' ? 'true' : 'false';
        Setting::set('maintenance_mode', $value);

        $this->info("Maintenance mode turned {$mode}.");
    }
}