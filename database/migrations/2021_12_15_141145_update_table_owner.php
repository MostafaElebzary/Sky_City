<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateTableOwner extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('owners', function (Blueprint $table) {

            $table->date('id_num_expired')->nullable()->after('id_num');
            $table->string('id_num_export')->nullable()->after('id_num_expired');
            $table->string('district')->nullable()->after('id_num_export');
            $table->string('nationality')->nullable()->after('district');
            $table->string('tax_num')->nullable()->after('nationality');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('owners');
    }
}
