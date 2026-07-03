<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // =============================================
        // 1. Fix remaining data types in `projects`
        // =============================================
        // Already applied by partial run: category_id → bigint, sponsor_id → bigint,
        // user_id → bigint, amount → decimal(15,2)
        // Remaining: images → text, description → text
        DB::statement("UPDATE projects SET images = JSON_ARRAY(images) WHERE images IS NOT NULL AND images != '' AND images NOT LIKE '[%'");
        DB::statement('ALTER TABLE projects MODIFY images TEXT NULL');
        DB::statement('ALTER TABLE projects MODIFY description TEXT NULL');

        // =============================================
        // 2. Fix `sponsors.amount` → decimal
        // =============================================
        DB::statement("UPDATE sponsors SET amount = NULL WHERE amount IS NOT NULL AND amount NOT REGEXP '^[0-9]+(\\.[0-9]+)?$'");
        DB::statement('ALTER TABLE sponsors MODIFY amount DECIMAL(15, 2) NULL');

        // =============================================
        // 3. Fix `certificates.images` → text (JSON)
        // =============================================
        DB::statement("UPDATE certificates SET images = JSON_ARRAY(images) WHERE images IS NOT NULL AND images != '' AND images NOT LIKE '[%'");
        DB::statement('ALTER TABLE certificates MODIFY images TEXT NULL');

        // =============================================
        // 4. Fix `gallaries.description` → text
        // =============================================
        DB::statement('ALTER TABLE gallaries MODIFY description TEXT NULL');

        // =============================================
        // 5. Add foreign key constraints on `projects`
        // =============================================
        Schema::table('projects', function (Blueprint $table) {
            $table->foreign('category_id', 'fk_projects_category')
                  ->references('id')->on('project_categories')
                  ->nullOnDelete();
            $table->foreign('sponsor_id', 'fk_projects_sponsor')
                  ->references('id')->on('sponsors')
                  ->nullOnDelete();
            $table->foreign('user_id', 'fk_projects_user')
                  ->references('id')->on('users')
                  ->nullOnDelete();
        });

        // =============================================
        // 6. Add indexes on `projects`
        // =============================================
        Schema::table('projects', function (Blueprint $table) {
            $table->index('amount', 'idx_projects_amount');
            $table->index('status', 'idx_projects_status');
            $table->index('created_at', 'idx_projects_created_at');
        });

        // =============================================
        // 7. Add `read_at` + indexes to `messages`
        // =============================================
        Schema::table('messages', function (Blueprint $table) {
            $table->timestamp('read_at')->nullable()->after('message');
            $table->index('email', 'idx_messages_email');
            $table->index('created_at', 'idx_messages_created_at');
            $table->index('read_at', 'idx_messages_read_at');
        });

        // =============================================
        // 8. Add indexes on remaining tables
        // =============================================
        Schema::table('certificates', function (Blueprint $table) {
            $table->index('issued_date', 'idx_certificates_issued_date');
        });

        Schema::table('gallaries', function (Blueprint $table) {
            $table->index('created_at', 'idx_gallaries_created_at');
        });
    }

    public function down(): void
    {
        // Drop indexes
        Schema::table('gallaries', function (Blueprint $table) {
            $table->dropIndex('idx_gallaries_created_at');
        });

        Schema::table('certificates', function (Blueprint $table) {
            $table->dropIndex('idx_certificates_issued_date');
        });

        Schema::table('messages', function (Blueprint $table) {
            $table->dropIndex('idx_messages_read_at');
            $table->dropIndex('idx_messages_created_at');
            $table->dropIndex('idx_messages_email');
            $table->dropColumn('read_at');
        });

        Schema::table('projects', function (Blueprint $table) {
            $table->dropIndex('idx_projects_created_at');
            $table->dropIndex('idx_projects_status');
            $table->dropIndex('idx_projects_amount');
        });

        // Drop foreign keys
        Schema::table('projects', function (Blueprint $table) {
            $table->dropForeign('fk_projects_category');
            $table->dropForeign('fk_projects_sponsor');
            $table->dropForeign('fk_projects_user');
        });

        // Revert data types
        DB::statement('ALTER TABLE gallaries MODIFY description VARCHAR(255) NULL');
        DB::statement('ALTER TABLE certificates MODIFY images VARCHAR(255) NULL');
        DB::statement('ALTER TABLE sponsors MODIFY amount VARCHAR(255) NULL');
        DB::statement('ALTER TABLE projects MODIFY description VARCHAR(255) NULL');
        DB::statement('ALTER TABLE projects MODIFY images VARCHAR(255) NULL');

        // Note: category_id, sponsor_id, user_id, amount changes from partial run
        // are NOT reverted here (they were applied by the failed migration attempt
        // and were never recorded in the migrations table)
    }
};
