<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetailedAttendancesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detailed__attendances', function (Blueprint $table) {
          

            $table->unsignedBigInteger('Id_Dd');
            $table->unsignedInteger('Id_Sv');
            $table->String('Ly_Do');
            $table->String('So_Tv');
            $table->foreign('Id_Dd')->references('id')->on('attendances');
            $table->foreign('Id_Sv')->references('id')->on('students');
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
        Schema::dropIfExists('detailed__attendances');
    }
}
