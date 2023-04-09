<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id')->unsigned()->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onUpdate('cascade');
            $table->string('billing_email')->nullable();
            $table->string('billing_name')->nullable();
            $table->string('billing_address')->nullable();
            $table->string('billing_address2')->nullable();
            $table->string('billing_buliding')->nullable();
            $table->string('billing_road')->nullable();
            $table->string('billing_block')->nullable();
            $table->string('billing_speical_direcstions')->nullable();

            $table->string('billing_country')->nullable();
            $table->string('billing_city')->nullable();
            $table->string('billing_province')->nullable();
            $table->string('billing_postalcode')->nullable();
            $table->string('billing_phone')->nullable();
            $table->string('billing_discount')->nullable();
            $table->string('billing_discount_code')->nullable();
            $table->string('billing_subtotal')->nullable();
            $table->string('billing_tax')->nullable();
            $table->string('billing_delivery')->nullable();
            $table->string('billing_total')->nullable();
            $table->string('payment_gateway')->default('Debit Card');
            $table->string('error')->nullable();
            $table->string('transactionId')->nullable();
            $table->string('invoice_id')->nullable();
            $table->boolean('shipped')->default(false);
            $table->string('confirm')->nullable();
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
        Schema::dropIfExists('orders');
    }
}
