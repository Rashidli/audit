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
        if(!Schema::hasTable('order_question')){
            Schema::create('order_question', function (Blueprint $table) {

                $table->id();
                $table->boolean('answer');
                $table->unsignedBigInteger('order_id');
                $table->unsignedBigInteger('question_id');
                $table->foreign('order_id')->references('id')->on('orders')->onDelete('cascade');
                $table->foreign('question_id')->references('id')->on('questions')->onDelete('cascade');
                $table->timestamps();

            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order_questions');
    }
};
