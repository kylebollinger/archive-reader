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
        Schema::create('book_volumes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('book_id')->constrained();
            $table->string('title', 255)->nullable();
            $table->integer('sequence')->nullable();
            $table->json('data')->nullable();
            $table->json('import_data')->nullable();
            $table->timestamps();
            $table->softDeletes($column = 'deleted_at', $precision = 0);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('book_volumes');
    }
};
