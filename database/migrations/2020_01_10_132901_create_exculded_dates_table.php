<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExculdedDatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('exculded_dates', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->date('date');
            $table->integer('delivery_time_id');
            $table->integer('city_id');
            $table->unique(['date', 'delivery_time_id', 'city_id']);
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
        Schema::dropIfExists('exculded_dates');
    }
}
