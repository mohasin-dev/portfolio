<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMyexperiencesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('myexperiences', function (Blueprint $table) {
            $table->increments('id');
            $table->string('designation');
            $table->string('company_name');
            $table->string('description');
            $table->string('session_start');
            $table->string('session_end');
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
        Schema::dropIfExists('myexperiences');
    }
}
