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
            $table->id();
            $table->string('surname');
            $table->string('firstname');
            $table->string('middlename');
            $table->string('sex');
            $table->string('marital_status');
            $table->string('state_of_origin');
            $table->date('dob');
            $table->string('nationality');
            $table->string('religion');
            $table->string('phone_number');
            $table->string('alt_phone_number');
            $table->string('email');
            $table->string('alt_email');
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
