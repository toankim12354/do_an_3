<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubjectClassLmhsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subject__class__lmhs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('Mon_id');
            $table->unsignedInteger('Gv_id');
            $table->String('Ten_Lop_Hoc');
            $table->foreign('Mon_id')->references('id')->on('subjects');
            $table->foreign('Gv_id')->references('id')->on('teachers');
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
        Schema::dropIfExists('subject__class__lmhs');
    }
}
