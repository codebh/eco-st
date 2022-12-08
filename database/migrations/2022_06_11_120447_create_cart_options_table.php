<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use phpDocumentor\Reflection\Types\Nullable;

class CreateCartOptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cart_options', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('cartItem_id')->unsigned()->nullable();
            $table->foreign('cartItem_id')->references('id')->on('cart_items')->onDelete('cascade');
            // $table->string('key');
            // $table->string('value');
            $table->string('color')->nullable();
            $table->string('notes')->nullable();
// category1
            $table->string('a_size1')->nullable();
            $table->string('a_size2')->nullable();
            $table->string('a_size3')->nullable();
            $table->string('a_size4')->nullable();
            $table->string('a_size5')->nullable();
            $table->string('a_size6')->nullable();
// category2 --only color note
// category else
            $table->string('de_size')->nullable();


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
        Schema::dropIfExists('cart_options');
    }
}
