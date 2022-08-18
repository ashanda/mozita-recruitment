<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employers', function (Blueprint $table) {
            $table->id();
            $table->integer('employer_id');
            $table->integer('employer_uid');
            $table->string('company_name');
            $table->string('company_email');
            $table->string('company_branch');
            $table->string('company_address');
            $table->string('contact_person');
            $table->string('position');
            $table->string('date_first_contact_made');
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
        Schema::dropIfExists('employers');
    }
}
