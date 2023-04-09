<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTagsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tags', function (Blueprint $table) {
            $table->id();
            $table->string('name_ar')->unique();
            $table->string('name_en')->unique();
            $table->string('collection')->nullable()->default('false');
            $table->string('c_show')->nullable()->default('not active');;
            $table->string('c_image')->nullable();
            $table->string('c_image_en')->nullable();
            $table->string('started_at')->nullable();
            $table->string('ended_at')->nullable();
//            $table->string('status')->default('not active');
            $table->string('des_ar')->nullable();
            $table->string('des_en')->nullable();
            $table->string('slug');

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
        Schema::dropIfExists('tags');
    }
}
