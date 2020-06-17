<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServieHotelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('servie_hotels', function (Blueprint $table) {
            $table->id();
            $table->string("title");
            $table->text("description");
            $table->string("cost");
            $table->string("slug")->unique();
            $table->boolean("isReserve")->default(false);
            $table->timestamp("deadtime");
            $table->string("specification");
            $table->boolean("active")->default();
            $table->unsignedBigInteger('hotel_id');
            $table->timestamps();

            $table->foreign('hotel_id')
                ->references('id')
                ->on('hotels')
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
        Schema::dropIfExists('servie_hotels');
    }
}
