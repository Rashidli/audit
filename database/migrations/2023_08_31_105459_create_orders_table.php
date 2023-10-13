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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('order_number')->nullable();
            $table->string('order_date')->nullable();
            $table->string('order_id')->nullable();
            $table->string('service_type')->nullable();
            $table->string('phone_2')->nullable();
            $table->string('service_note')->nullable();
            $table->string('call_date')->nullable();
            $table->string('order_end_date')->nullable();
            $table->string('customer_name')->nullable();
            $table->string('phone')->nullable();
            $table->string('corporate')->nullable();
            $table->string('operator')->nullable();
            $table->string('order_status')->nullable();
            $table->string('oz_tutma')->nullable();
            $table->string('amount')->nullable();
            $table->string('driver')->nullable();
            $table->string('reason_of_cancel')->nullable();
            $table->string('driver_amount')->default(0);
            $table->string('master')->default(0);
            $table->string('worker')->default(0);
            $table->string('additional_service')->nullable();
            $table->string('department')->nullable();
            $table->string('satisfaction_status')->nullable();
            $table->string('address')->nullable();
            $table->string('speaking_duration')->nullable();
            $table->string('note')->nullable();
            $table->boolean('is_new')->default(1);
            $table->string('auditor_name')->nullable();
            $table->boolean('auditor_status')->default(0);
            $table->string('auditor_note')->nullable();
            $table->string('worker_count','11')->nullable();
            $table->string('master_count','11')->nullable();
            $table->string('car_number','11')->nullable();
            $table->string('driver_phone','15')->nullable();
            $table->string('driver_group_head')->nullable();
            $table->string('garage_name')->nullable();
            $table->boolean('driver_thick')->default(0);
            $table->boolean('master_thick')->default(0);
            $table->boolean('worker_thick')->default(0);
            $table->boolean('operator_thick')->default(0);
            $table->boolean('satisfied_thick')->default(0);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
