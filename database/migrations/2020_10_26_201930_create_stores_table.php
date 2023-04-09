<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stores', function (Blueprint $table) {
            $table->id();
            $table->string('f_name')->nullable();
            $table->string('l_name')->nullable();
            $table->string('name');
            $table->string('slug');
            $table->string('code')->nullable()->unique();
            $table->string('email')->unique();
            $table->string('mobile')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('percentage')->nullable();
            $table->string('i_account')->nullable();
            $table->string('address')->nullable();
            $table->string('cr')->nullable();
            $table->string('cpr')->nullable();
            $table->string('logo')->nullable();

            $table->string('iban')->nullable();
            $table->text('bio')->nullable();
            $table->enum('new', ['yes', 'no'])->default('no');
            $table->rememberToken();
            $table->enum('close', ['yes', 'no'])->default('no');
            $table->date('date_of_end')->nullable();
            $table->longText('reason')->nullable();
            $table->rememberToken();
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
        Schema::dropIfExists('stores');
    }
}
