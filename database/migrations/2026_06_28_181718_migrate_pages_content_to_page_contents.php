<?php

use App\Models\Page;
use App\Models\PageContent;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    public function up(): void
    {
        foreach (Page::all() as $page) {
            if (!$page->content) continue;
            $data = json_decode($page->content, true);
            if (!is_array($data)) continue;
            foreach ($data as $key => $value) {
                PageContent::updateOrCreate(
                    ['page_id' => $page->id, 'key' => $key],
                    ['value' => $value]
                );
            }
        }
    }

    public function down(): void
    {
        PageContent::truncate();
    }
};
