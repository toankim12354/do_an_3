<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateScheduleLhsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('schedule__lhs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('Ca_id');
            $table->unsignedBigInteger('Phong_id');
            $table->unsignedBigInteger('Lmh_id');
            $table->foreign('Ca_id')->references('id')->on('school__shifts');
            $table->foreign('Lmh_id')->references('id')->on('subject__class__lmhs');
            $table->foreign('Phong_id')->references('id')->on('classrooms');
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
        Schema::dropIfExists('schedule__lhs');
    }
}
