<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('messages', function (Blueprint $table) {
            $table->string('type')->default('general')->after('id');
            $table->boolean('is_archived')->default(false)->after('read_at');
            $table->boolean('is_spam')->default(false)->after('is_archived');
            $table->string('ip_address', 45)->nullable()->after('is_spam');
            $table->text('user_agent')->nullable()->after('ip_address');
        });
    }

    public function down(): void
    {
        Schema::table('messages', function (Blueprint $table) {
            $table->dropColumn(['type', 'is_archived', 'is_spam', 'ip_address', 'user_agent']);
        });
    }
};
