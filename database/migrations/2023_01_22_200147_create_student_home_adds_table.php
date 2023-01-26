<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentHomeAddsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('student_home_adds', function (Blueprint $table) {
            $table->id();
            $table->integer('student_id');
            $table->integer('country_id');
            $table->integer('state');
            $table->integer('town');
            $table->integer('street');
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
        Schema::dropIfExists('student_home_adds');
    }
}
