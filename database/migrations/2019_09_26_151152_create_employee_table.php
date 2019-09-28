<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmployeeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employee', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('name');
            $table->string('fathers_name');
            $table->string('date_of_birth');
            $table->string('gender');
            $table->string('phone');
            $table->string('present_address');
            $table->string('premanent_address');
            $table->string('email');
            $table->string('password');
            $table->string('image');
            $table->string('employee_id');
            $table->string('department');
            $table->string('designation');
            $table->string('date_of_joining');
            $table->string('joining_salary');
            $table->string('resume');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('employee');
    }
}
