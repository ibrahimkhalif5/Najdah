<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->id(); 
            $table->unsignedBigInteger('category_id')->nullable();
            $table->unsignedBigInteger('sponsor_id')->nullable();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->decimal('amount', 15, 2)->nullable();
            $table->string('status')->nullable();
            $table->string('title')->nullable();
            $table->string('description')->nullable();
            $table->longText('location')->nullable();
            $table->string('images')->nullable();
            $table->timestamps(); 
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('projects');
    }
};
