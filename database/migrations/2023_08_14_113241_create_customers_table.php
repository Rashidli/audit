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
        Schema::create('customers', function (Blueprint $table) {
            $table->id();
            $table->string('order_date');
            $table->string('order_id');
            $table->string('service_type');
            $table->string('phone_2');
            $table->string('service_note');
            $table->string('call_date');
            $table->string('order_end_date');
            $table->string('customer_name');
            $table->string('phone');
            $table->string('corporate');
            $table->string('operator');
            $table->string('order_status');
            $table->string('oz_tutma');
            $table->string('amount');
            $table->string('driver');
            $table->string('reason_of_cancel');
            $table->string('driver_amount');
            $table->string('master');
            $table->string('worker');
            $table->string('additional_service');
            $table->string('department');
            $table->string('satisfaction_status');
            $table->string('address');
            $table->string('speaking');
            $table->string('note');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customers');
    }
};
