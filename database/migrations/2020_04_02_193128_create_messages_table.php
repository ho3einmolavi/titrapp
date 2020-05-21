<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMessagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('messages', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('receiver_user_id')->unsigned();
            $table->foreign('receiver_user_id')->references('id')->on('users');
            $table->bigInteger('sender_user_id')->unsigned();
            $table->foreign('sender_user_id')->references('id')->on('users');
            $table->boolean('seen');
            $table->tinyInteger('type');
            $table->text('body')->nullable();
            $table->text('voice')->nullable();
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
        Schema::dropIfExists('messages');
    }
}
