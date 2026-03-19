<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        if (Schema::hasTable('categories')) {
            DB::statement("ALTER TABLE categories MODIFY COLUMN for_type ENUM('posts', 'pages', 'faqs') NOT NULL DEFAULT 'posts'");
        }
    }

    public function down(): void
    {
        if (Schema::hasTable('categories')) {
            DB::statement("UPDATE categories SET for_type = 'posts' WHERE for_type = 'faqs'");
            DB::statement("ALTER TABLE categories MODIFY COLUMN for_type ENUM('posts', 'pages') NOT NULL DEFAULT 'posts'");
        }
    }
};
