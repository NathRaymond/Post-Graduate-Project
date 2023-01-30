<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentCertifcatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('student_certifcates', function (Blueprint $table) {
            $table->id();
            $table->string('school');
            $table->string('matric_number');
            $table->string('country');
            $table->string('town');
            $table->string('year');
            $table->date('date_obtained');
            $table->string('class_of_degree');
            $table->string('certificate');
            $table->string('cgpa');
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
        Schema::dropIfExists('student_certifcates');
    }
}
