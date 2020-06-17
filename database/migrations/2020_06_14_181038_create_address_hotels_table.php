<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAddressHotelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('address_hotels', function (Blueprint $table) {
            $table->id();
            $table->string('title', 100);
            $table->string('phone', 45);
            $table->string('phone_mobile', 13);
            $table->text('address');
            $table->string('postcode');
            $table->string('firstname', 100);
            $table->string('lastname', 100);
            $table->boolean('active', 100)->default(true);
            $table->enum('type', ['hotel', 'restaurant', 'coffeeShop'])->default('hotel');
            /*
             * type means of hotel, restaurant and coffeeShop
             */
            $table->unsignedBigInteger('type_id');
            $table->unsignedBigInteger('country_id');
            $table->unsignedBigInteger('state_id');
            $table->unsignedBigInteger('city_id');
            $table->timestamps();

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
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('address_hotels');
    }
}
