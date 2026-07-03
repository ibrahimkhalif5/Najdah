<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('projects', function (Blueprint $table) {
            $table->decimal('project_cost', 15, 2)->nullable()->after('amount');
            $table->date('start_date')->nullable()->after('project_cost');
            $table->date('completed_date')->nullable()->after('start_date');
        });
    }

    public function down(): void
    {
        Schema::table('projects', function (Blueprint $table) {
            $table->dropColumn(['project_cost', 'start_date', 'completed_date']);
        });
    }
};
