<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePersonPostTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('person_post', function (Blueprint $table) {
            // $table->id();
            $table->integer('person_id')->unsigned();
            $table->integer('post_id')->unsigned();
            $table->foreign('person_id')->references('id')->on('people');
            $table->foreign('post_id')->references('id')->on('posts');

            $table->primary(['person_id', 'post_id']);
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
        Schema::dropIfExists('person_post');
    }
}
