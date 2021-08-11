<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRacesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('races', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('championship_id')->unsigned()->nullable();
            $table->bigInteger('circuit_id')->unsigned()->nullable();
            $table->string('name','200');
            $table->string('slug','200');
            $table->string('image','200')->nullable();
            $table->text('description');
            $table->dateTime('started_at');
            $table->timestamps();
            $table->foreign('championship_id')->references('id')->on('championship')->onDelete('cascade');
            $table->foreign('circuit_id')->references('id')->on('circuits')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('races');
    }
}
