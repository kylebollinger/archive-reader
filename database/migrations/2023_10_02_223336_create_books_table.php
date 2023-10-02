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
        Schema::create('books', function (Blueprint $table) {
            $table->id();
            $table->integer('category_id')->nullable();
            $table->string('title', 255)->nullable();
            $table->string('subtitle', 255)->nullable();
            $table->string('author', 255)->nullable();
            $table->string('cover', 255)->nullable();
            $table->date('publish_date')->nullable();
            $table->text('description')->nullable();
            $table->string('uuid', 7)->nullable()->unique()->index();
            $table->string('slug', 255)->nullable()->unique()->index();
            $table->string('state', 255)->default('initialized')->index();
            $table->json('import_data')->nullable();
            $table->json('data')->nullable();
            $table->timestamps();
            $table->softDeletes($column = 'deleted_at', $precision = 0);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('books');
    }
};
