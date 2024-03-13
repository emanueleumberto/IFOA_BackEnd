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
            $table->string('title');
            $table->integer('pages');
            $table->integer('year');
            $table->foreignId('author_id');
            $table->foreign('author_id')->on('authors')->references('id')
                    ->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('category_id');
            $table->foreign('category_id')->on('categories')->references('id')
                    ->onDelete('cascade')->onUpdate('cascade');
            $table->timestamps();
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
