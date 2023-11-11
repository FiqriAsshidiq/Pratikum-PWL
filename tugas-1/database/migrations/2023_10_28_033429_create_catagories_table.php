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
        Schema::create('catagories', function (Blueprint $table) {
            $table->id('Catagori_id');
            $table->string('catagori'. 255);
            $table->unsignedBigInteger('book_id');
            $table->timestamps();

            $table->foreign('book_id')->references('book_id')->on('books')
            ->onDelete('cascade')      
            ->onUpdate('cascade');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('catagories');
    }
};
