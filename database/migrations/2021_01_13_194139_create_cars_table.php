<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cars', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->date('production_year');
            $table->integer('travelled_kilometers');
            $table->unsignedBigInteger('models_car_id');
            $table->unsignedBigInteger('manufacturer_id');
            $table->timestamps();

            $table->foreign('models_car_id')->references('id')->on('models_cars');
            $table->foreign('manufacturer_id')->references('id')->on('manufacturers');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::disableForeignKeyConstraints();
        Schema::dropIfExists('cars');
    }
}
