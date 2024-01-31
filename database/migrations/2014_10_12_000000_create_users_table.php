<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('city')->nullable();
            $table->string('country')->nullable();
            $table->string('account_type')->nullable();
            $table->string('user_id')->nullable();
            $table->string('FirstName')->nullable();
            $table->string('mobile')->nullable();
            $table->string('altnumber')->nullable();
            $table->string('LastName')->nullable();
            $table->string('dob')->nullable();
            $table->string('vat')->nullable();
            $table->string('image')->nullable();
            $table->Integer('company_id')->nullable();
            $table->tinyInteger('active');
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
