<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJobCatagoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('job_catagories', function (Blueprint $table) {
            $table->id();
            $table->integer('job_catagory_id');
            $table->string('job_catagory_name');
            $table->integer('job_sub_catagory_id');
            $table->string('job_sub_catagory_name');
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
        Schema::dropIfExists('job_catagories');
    }
}
