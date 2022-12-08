<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_product', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('order_id')->unsigned()->nullable();
            $table->foreign('order_id')->references('id')->on('orders')->onUpdate('cascade')->onDelete('set null');
            $table->bigInteger('product_id')->unsigned()->nullable();
            $table->foreign('product_id')->references('id')->on('products')->onUpdate('cascade')->onDelete('set null');
            $table->bigInteger('store_id')->unsigned()->nullable();
            $table->foreign('store_id')->references('id')->on('stores')->onUpdate('cascade')->onDelete('set null');
            $table->bigInteger('user_id')->unsigned()->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onUpdate('cascade');
            $table->string('color')->nullable();

            $table->string('price');
            $table->text('notes')->nullable();
            $table->string('confirm')->nullable();

            $table->string('ab_size1')->nullable();
            $table->string('ab_size2')->nullable();
            $table->string('ab_size3')->nullable();
            $table->string('ab_size4')->nullable();
            $table->string('ab_size5')->nullable();
            $table->string('ab_size6')->nullable();
//            $table->string('ab_color2')->nullable();


//            $table->string('sh_size')->nullable();
//            $table->string('sh_color')->nullable();


            $table->string('de_size')->nullable();
//            $table->string('de_size2')->nullable();


            $table->string('est_date')->default('still not start');;
            $table->string('shipped')->default(false);

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
        Schema::dropIfExists('order_products');
    }
}
