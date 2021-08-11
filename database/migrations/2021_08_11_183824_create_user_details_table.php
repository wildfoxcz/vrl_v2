<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_details', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('user_id')->unsigned();
            $table->string('name','200')->nullable();
            $table->date('birthday')->nullable();
            $table->integer('sex')->nullable();
            $table->string('image','200')->nullable();
            $table->string('facebook','200')->nullable();
            $table->string('instagram','200')->nullable();
            $table->string('youtube','200')->nullable();
            $table->string('twitch','200')->nullable();
            $table->string('city','200')->nullable();
            $table->text('description')->nullable();
            $table->foreign('user_id')->references('id')->on('users');
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
        Schema::dropIfExists('user_details');
    }
}
