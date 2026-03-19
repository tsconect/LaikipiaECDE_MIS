<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        if (Schema::hasTable('faqs')) {
            DB::table('faqs')->where('status', 'draft')->update(['status' => 'published']);
        }
    }

    public function down(): void
    {
        // Intentionally left blank to avoid reverting valid published content to draft.
    }
};
