<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->string('key')->primary();
            $table->text('value')->nullable();
            $table->timestamps();
        });

        DB::table('settings')->insert([
            ['key' => 'maintenance_mode', 'value' => 'false'],
            ['key' => 'site_name', 'value' => 'JinoConklin.com'],
            ['key' => 'site_description', 'value' => 'Coming Soon'],
        ]);
    }

    public function down(): void
    {
        Schema::dropIfExists('settings');
    }
};
