<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCircuitsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('circuits', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name','200');
            $table->string('country','3');
            $table->string('image','200')->nullable();
            $table->string('logo','200')->nullable();
            $table->string('youtube','200')->nullable();
            $table->decimal('circuit_length',5, 3)->nullable();
            $table->integer('turns')->nullable();
            $table->text('fastest_time')->nullable();
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
        Schema::dropIfExists('circuits');
    }
}
