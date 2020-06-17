<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHotelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hotels', function (Blueprint $table) {
            $table->id();
            $table->string('name',100);
            $table->text('about');
            $table->string('advertise_teaser_src',255)->nullable();
            $table->bigInteger('view')->default(0);
            $table->unsignedBigInteger('slider_id');
            $table->timestamps();

            $table->foreign('slider_id')
                ->references('id')
                ->on('sliders')
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
        Schema::dropIfExists('hotels');
    }
}
