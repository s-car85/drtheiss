<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePhotosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
          Schema::create('photos', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('photo_id')->unsigned();
            $table->foreign('photo_id')->references('id')->on('pages')->onDelete('cascade');

            $table->string('name');
            $table->string('title');
            $table->string('description');
            $table->string('path');
            $table->string('thumbnail_path');
            $table->integer('order');

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
         Schema::drop('photos');
    }
}
