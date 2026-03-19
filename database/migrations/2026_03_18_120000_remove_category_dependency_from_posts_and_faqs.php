<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration {
    public function up(): void
    {
        DB::statement('ALTER TABLE posts DROP FOREIGN KEY posts_category_id_foreign');
        DB::statement('ALTER TABLE posts MODIFY category_id BIGINT UNSIGNED NULL');
        DB::statement('ALTER TABLE posts ADD CONSTRAINT posts_category_id_foreign FOREIGN KEY (category_id) REFERENCES categories(id) ON DELETE SET NULL');

        DB::statement('ALTER TABLE faqs DROP FOREIGN KEY faqs_category_id_foreign');
        DB::statement('ALTER TABLE faqs MODIFY category_id BIGINT UNSIGNED NULL');
        DB::statement('ALTER TABLE faqs ADD CONSTRAINT faqs_category_id_foreign FOREIGN KEY (category_id) REFERENCES categories(id) ON DELETE SET NULL');
    }

    public function down(): void
    {
        DB::statement("UPDATE posts SET category_id = (SELECT id FROM categories ORDER BY id LIMIT 1) WHERE category_id IS NULL");
        DB::statement("UPDATE faqs SET category_id = (SELECT id FROM categories ORDER BY id LIMIT 1) WHERE category_id IS NULL");

        DB::statement('ALTER TABLE posts DROP FOREIGN KEY posts_category_id_foreign');
        DB::statement('ALTER TABLE posts MODIFY category_id BIGINT UNSIGNED NOT NULL');
        DB::statement('ALTER TABLE posts ADD CONSTRAINT posts_category_id_foreign FOREIGN KEY (category_id) REFERENCES categories(id) ON DELETE RESTRICT');

        DB::statement('ALTER TABLE faqs DROP FOREIGN KEY faqs_category_id_foreign');
        DB::statement('ALTER TABLE faqs MODIFY category_id BIGINT UNSIGNED NOT NULL');
        DB::statement('ALTER TABLE faqs ADD CONSTRAINT faqs_category_id_foreign FOREIGN KEY (category_id) REFERENCES categories(id) ON DELETE RESTRICT');
    }
};
