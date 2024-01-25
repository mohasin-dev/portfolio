<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('designation')->nullable();
            $table->string('email')->unique();
            $table->string('email2')->unique()->nullable();
            $table->string('contact1')->unique()->nullable();
            $table->string('contact2')->unique()->nullable();
            $table->text('about_me')->nullable();
            $table->text('about_skill')->nullable();
            $table->text('about_service')->nullable();
            $table->text('about_quality')->nullable();
            $table->string('address')->nullable();
            $table->string('website1')->nullable();
            $table->string('website2')->nullable();
            $table->string('avatar')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
