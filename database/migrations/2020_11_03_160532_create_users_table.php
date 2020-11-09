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
            $table->increments('id')->nullable(false);
            $table->string('name')->nullable(false);
            $table->string('full_address')->nullable();
            $table->integer('gender')->nullable(false);
            $table->date('birthday')->nullable();
            $table->string('email')->nullable();
            $table->double('phone_number')->nullable(false);
            $table->string('password')->nullable(false);
            $table->unsignedInteger('role_id');
            $table->unsignedInteger('department_id');
            $table->foreign('role_id')->references('id')->on('roles');
            $table->foreign('department_id')->references('id')->on('departments');
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
