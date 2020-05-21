<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('city_id')->nullable();
            $table->string('name')->nullable();
            $table->string('email')->nullable();
            $table->timestamp('vipTime')->nullable();
            $table->string('phone')->unique();
            $table->integer('type');
            $table->integer('position')->nullable();
            $table->boolean('active');
            $table->string('ip')->nullable();
            $table->string('api_token',100)->unique();


            $table->text('bio')->nullable();
            $table->text('image')->nullable();
            $table->string('instagram')->nullable();
            $table->string('telegram')->nullable();
            $table->string('whatsapp')->nullable();
            $table->string('phoneshow')->nullable();

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
        Schema::dropIfExists('users');
    }
}
