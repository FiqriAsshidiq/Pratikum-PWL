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
        Schema::create('loan_details', function (Blueprint $table) {
            $table->id('loan_detail_id');
            $table->unsignedBigInteger('loan_id');
            $table->unsignedBigInteger('book_id');
            $table->timestamps();

            $table->foreign('book_id')->references('book_id')->on('books')
            ->onDelete('cascade')      
            ->onUpdate('cascade');    
            
            $table->foreign('loan_id')->references('loan_id')->on('loans')
            ->onDelete('cascade')      
            ->onUpdate('cascade');            


        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('loan_details');
    }
};
