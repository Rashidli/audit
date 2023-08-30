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
            // main info
            $table->string('company_name');
            $table->string('company_voen');
            $table->string('company_area');
            $table->string('company_phone');
            $table->string('main_address');
            $table->boolean('is_active')->default(true);

            // bank info
            $table->string('bank_branch');
            $table->string('bank_voen');
            $table->string('bank_swift');
            $table->string('bank_iban');
            $table->string('bank_code');

            // company info
            $table->string('company_cat');
            $table->integer('company_count_employee');
            $table->string('company_address');
            $table->string('company_return');
            $table->string('company_type');

            // contract info
            $table->string('contract_name');
            $table->string('contract_curator');
            $table->string('contract_date');
            $table->string('contract_number');
            $table->string('contract_end_date');
            $table->string('contract_file');

            // responsible person
            $table->string('person_name');
            $table->string('person_phone');
            $table->string('person_address');
            $table->string('person_filial');
            $table->string('person_email');
            
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
