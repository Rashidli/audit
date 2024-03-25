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
        Schema::create('plan_order_plan_question', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('plan_order_id');
            $table->unsignedBigInteger('plan_question_id');
            $table->string('answer')->nullable();
            $table->text('comment')->nullable();

            $table->foreign('plan_order_id')->references('id')->on('plan_orders')->onDelete('cascade');
            $table->foreign('plan_question_id')->references('id')->on('plan_questions')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('plan_order_plan_question');
    }
};
