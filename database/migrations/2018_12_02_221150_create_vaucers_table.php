<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVaucersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vaucers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('vaucer_title');
            $table->string('slug')->unique();
            $table->string('vaucer_image')->nullable();
            $table->string('vaucer_banner')->nullable();
            $table->string('vaucer_desc');
            $table->text('vaucer_body');
            $table->integer('user_id')->unsigned();
            $table->boolean('active')->default(false);
            $table->integer('vaucer_count')->unsigned()->nullable()->default(0);
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('vaucers');
    }
}
