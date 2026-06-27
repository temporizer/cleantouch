<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('page_views', function (Blueprint $table) {
            $table->id();
            $table->string('url');
            $table->string('ip')->nullable();
            $table->string('user_agent')->nullable();
            $table->string('referer')->nullable();
            $table->boolean('is_bot')->default(false);
            $table->timestamp('visited_at');

            $table->index('visited_at');
            $table->index('url');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('page_views');
    }
};
