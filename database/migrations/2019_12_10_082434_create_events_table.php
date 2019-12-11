<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title');
            $table->string('location');
            $table->string('duration');
            $table->date('start_date');
            $table->date('end_date');
            $table->string('contact');
            $table->string('limitation');
            $table->string('description');
            $table->string('transpotation');
            $table->string('price');
            $table->string('include');
            $table->bigInteger('user_id');
            $table->bigInteger('categories_id');
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
        Schema::dropIfExists('events');
    }
}
