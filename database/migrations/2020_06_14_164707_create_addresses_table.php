<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAddressesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('addresses', function (Blueprint $table) {
            $table->id();
            $table->string('title',100);
            $table->string('phone',45);
            $table->string('phone_mobile',13);
            $table->text('address');
            $table->string('postcode');
            $table->string('firstname',100);
            $table->string('lastname',100);
            $table->boolean('active',100)->default(true);
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('country_id');
            $table->unsignedBigInteger('state_id');
            $table->unsignedBigInteger('city_id');
            $table->timestamps();

            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->foreign('country_id')
                ->references('id')
                ->on('countries')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->foreign('state_id')
                ->references('id')
                ->on('states')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->foreign('city_id')
                ->references('id')
                ->on('cities')
                ->onDelete('cascade')
                ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('addresses');
    }
}
