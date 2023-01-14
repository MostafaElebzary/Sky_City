<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSellContractsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sell_contracts', function (Blueprint $table) {
            $table->id();
//            owner data from relation
            $table->foreignId('owner_id')->nullable()->constrained('owners')->nullOnDelete();
            $table->string('owner_name');
            $table->string('owner_nationality');
            $table->string('owner_identification');
            $table->date('owner_id_expire');
            $table->string('owner_id_source');
            $table->string('owner_address');
            $table->string('owner_district');
            $table->string('owner_phone');
//client data from relation
            $table->foreignId('client_id')->nullable()->constrained('clients')->nullOnDelete();
            $table->string('client_name');
            $table->string('client_nationality');
            $table->string('client_identification');
            $table->date('client_id_expire');
            $table->string('client_id_source');
            $table->string('client_phone');

// ad data from relation
            $table->foreignId('ad_id')->nullable()->constrained('advertisings')->nullOnDelete();
            $table->string('ad_name');
            $table->string('ad_address'); // district + city
            $table->string('ad_area'); //
            $table->string('ad_instrument_number'); // رقم الصك
            $table->date('ad_instrument_date'); // تاريخ الصك
//            ad contract  data
            $table->string('north_border');
            $table->string('north_length');

            $table->string('south_border');
            $table->string('south_length');

            $table->string('east_border');
            $table->string('east_length');

            $table->string('west_border');
            $table->string('west_length');


//            contract
            $table->date('contract_date');
            $table->double('amount'); // الاجمالى
            $table->double('deposit'); //العربون
            $table->double('remaining'); // المتبقى
            $table->date('remaining_date'); //تاريخ دفع المتبقى

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
        Schema::dropIfExists('sell_contracts');
    }
}
