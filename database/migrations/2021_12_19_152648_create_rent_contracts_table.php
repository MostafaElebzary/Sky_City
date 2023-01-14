<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRentContractsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rent_contracts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('owner_id')->nullable()->constrained('owners')->nullOnDelete();
            $table->string('owner_name');
            $table->string('owner_identification');
            $table->string('owner_phone');

            $table->foreignId('client_id')->nullable()->constrained('clients')->nullOnDelete();
            $table->string('client_name');
            $table->string('client_identification');
            $table->string('client_phone');
            $table->date('client_id_expire');
            $table->string('client_id_source');
            $table->string('client_address');

            $table->foreignId('ad_id')->nullable()->constrained('advertisings')->nullOnDelete();
            $table->string('ad_name');
            $table->string('ad_city');
            $table->string('ad_district');
            $table->string('ad_instrument_number'); // رقم الصك
            $table->date('ad_instrument_date'); // تاريخ الصك

            $table->double('annual_rent');
            $table->string('rent_type'); //ربع سنوى - نصف سنوي ....
            $table->double('contract_deposit');
            $table->double('insurance_amount');
            $table->string('contract_duration');
            $table->date('contract_start_date');
            $table->date('contract_end_date');

            $table->longText('notes')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rent_contracts');
    }
}
