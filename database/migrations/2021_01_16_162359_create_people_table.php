<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePeopleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('people'))
        {
            Schema::create('people', function (Blueprint $table) {
                $table->increments('id');
                $table->string('name', 127)->comment('ユーザー名');
                // $table->string('email')->unique()->comment('メール');
                // $table->timestamp('email_verified_at')->nuulable();
                // $table->string('password');
                $table->timestamps();
                $table->dateTime('deleted_at')->nullable();
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('people');
    }
}
