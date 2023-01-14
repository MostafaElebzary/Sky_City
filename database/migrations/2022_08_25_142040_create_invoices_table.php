<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInvoicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoices', function (Blueprint $table) {
            $table->id();

            $table->string('order_id');
            $table->enum('order_type',[0,1])->default(0);
            $table->integer('order_return')->nullable();

            $table->string('client_name');
            $table->longText('client_phone');
            $table->longText('client_address')->nullable();
            $table->string('client_state')->nullable();
            $table->string('client_city')->nullable();

            $table->timestamp('date');
            $table->timestamp('issue_date')->nullable();
            $table->timestamp('due_date')->nullable();

            $table->string('description_ar');
            $table->string('description_en');
            $table->integer('quantity');
            $table->integer('price');
            $table->integer('vat');
            $table->integer('amount');
            $table->integer('total_amount');
            $table->integer('total_vat');

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
        Schema::dropIfExists('invoices');
    }
}
