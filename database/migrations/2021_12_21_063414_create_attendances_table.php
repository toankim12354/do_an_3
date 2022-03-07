<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAttendancesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('attendances', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('Id_Gv');
            $table->unsignedBigInteger('Id_Lmh');
            $table->date('Ngay_Dd');
            $table->String('Lan');
            $table->foreign('Id_Gv')->references('id')->on('teachers');
            $table->foreign('Id_Lmh')->references('id')->on('subject__class__lmhs');
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
        Schema::dropIfExists('attendances');
    }
}
