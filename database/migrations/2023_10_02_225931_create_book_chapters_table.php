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
        Schema::create('book_chapters', function (Blueprint $table) {
            $table->id();
            $table->foreignId('volume_id')->constrained('book_volumes')->references('id')->on('book_volumes')->onDelete('cascade');
            $table->integer('sequence')->nullable();
            $table->integer('book_sequence')->nullable();
            $table->text('title')->nullable();
            $table->longText('body')->nullable();
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
        Schema::dropIfExists('book_chapters');
    }
};
