<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->increments('id');
            $table->char('code', 10)->unique();
            $table->string("name", 50);
            $table->date("dob");
            $table->boolean("gender");
            $table->string("address", 100);
            $table->string('email', 100)->unique();
            $table->string('password');
            $table->char("phone", 10)->unique();
            $table->unsignedBigInteger("id_lop");
            $table->rememberToken();
            $table->foreign("id_lop")->references("id")->on("Lops");
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
        Schema::dropIfExists('students');
    }
}
