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
        Schema::table('orders', function (Blueprint $table) {
            $table->string('clothes')->nullable();
              $table->string('fmv')->nullable();
              $table->string('risk')->nullable();
              $table->string('internal_rules')->nullable();
              $table->string('behavior_rules')->nullable();
              $table->string('safety')->nullable();
              $table->string('delivery')->nullable();
              $table->string('workbook')->nullable();
              $table->string('license')->nullable();
              $table->string('ysb')->nullable();
              $table->string('medicine')->nullable();
              $table->string('cleaning')->nullable();
              $table->string('loading_unloading')->nullable();
              $table->string('traffic_rules')->nullable();
              $table->string('packaging')->nullable();
              $table->string('installation')->nullable();
              $table->string('special_loads')->nullable();
              $table->string('manual_lifting')->nullable();
              $table->string('lifting_correctly')->nullable();
              $table->string('job_easier')->nullable();
              $table->string('alternative_companies')->nullable();
              $table->string('recommend')->nullable();
              $table->string('auditor_name')->nullable();
              $table->string('auditor_status')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('orders', function (Blueprint $table) {
            //
        });
    }
};
