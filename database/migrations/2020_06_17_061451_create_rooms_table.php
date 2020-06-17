<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRoomsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rooms', function (Blueprint $table) {
            $table->id();
            $table->string("name",100);
            $table->decimal('price', 13, 0)->default(0);
            $table->boolean("isReserve")->default(false);
            $table->timestamp("deadTime");
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
        Schema::dropIfExists('rooms');
    }
}
