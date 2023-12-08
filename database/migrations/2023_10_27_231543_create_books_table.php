<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBooksTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('books', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('author');
            $table->year('year');
            $table->string('publisher');
            $table->string('city');
            $table->integer('quantity');
            $table->string('cover');
            $table->timestamps();

            $table->foreignId('bookshelf_id') 
                ->constrained('bookshelves') 
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('books', function (Blueprint $table) {
            $table->dropForeign(['bookshelf_id']); 
            $table->dropColumn('bookshelf_id');
        });

        Schema::dropIfExists('books');
    }
}
