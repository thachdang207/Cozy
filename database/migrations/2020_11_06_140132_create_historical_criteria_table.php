<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHistoricalCriteriaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('historical_criteria', function (Blueprint $table) {
            $table->increments('id')->nullable(false);
            $table->unsignedInteger('user_id');
            $table->unsignedInteger('criterion_id');
            $table->date('date');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('criterion_id')->references('id')->on('criteria')->onDelete('cascade');
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
        Schema::dropIfExists('historical_criteria');
    }
}
