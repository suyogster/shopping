<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCustomerPaymentMethodsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customer_payment_methods', function (Blueprint $table) {
            $table->increments('customer_payment_id');
            $table->integer('customer_id')->unsigned();
            $table->integer('payment_method_code')->unsigned();
            $table->string('credit_card_number');
            $table->string('payment_method_details');
            $table->timestamps();
        });

        Schema::table('customer_payment_methods', function (Blueprint $table){

            $table->foreign('customer_id')->references('customer_id')->on('customers');
            $table->foreign('payment_method_code')->references('payment_method_code')->on('ref_payment_methods');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('customer_payment_methods');
    }
}
