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
        Schema::create('libros', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->integer('pages');
            $table->integer('year');
            $table->foreignId('autore_id');
            $table->foreign('autore_id')->on('autores')->references('id')
                    ->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('categoria_id');
            $table->foreign('categoria_id')->on('categorias')->references('id')
                    ->onDelete('cascade')->onUpdate('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('libros');
    }
};
