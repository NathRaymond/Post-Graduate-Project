<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentOLevelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('student_o_levels', function (Blueprint $table) {
            $table->id();
            $table->integer('subject_id');
            $table->string('exam_type');
            $table->string('grade');
            $table->string('year');
            $table->string('reg_number');
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
        Schema::dropIfExists('student_o_levels');
    }
}
