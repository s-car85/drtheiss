<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLectureTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lectures', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('calling');
            $table->string('email');
            $table->string('licence');
            $table->string('foundation')->nullable();
            $table->string('phone')->nullable();
            $table->integer('lecture_events_id')->unsigned();
            $table->foreign('lecture_events_id')->references('id')->on('lecture_events')->onDelete('cascade');

            $table->string('ip_adress');
            $table->boolean('seen')->default(false);
            $table->tinyInteger('archived')->default(0);
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
        Schema::dropIfExists('lectures');
    }
}
