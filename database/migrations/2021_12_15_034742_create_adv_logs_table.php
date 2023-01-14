<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdvLogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('adv_logs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('advertising_id')->constrained('advertisings')->cascadeOnDelete();
            $table->text('ar_description');
            $table->text('en_description');
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
        Schema::dropIfExists('adv_logs');
    }
}
