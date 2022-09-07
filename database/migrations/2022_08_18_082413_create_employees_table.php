<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->integer('employee_id');
            $table->integer('employee_uid');
            $table->string('job_category');
            $table->string('job_sub_category');
            $table->string('job_role');
            $table->string('job_title');
            $table->string('candidate_name');
            $table->string('candidate_email');
            $table->string('cv');
            $table->string('attachment'); 
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
        Schema::dropIfExists('employees');
    }
}
