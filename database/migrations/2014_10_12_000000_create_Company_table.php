<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('company', function (Blueprint $table) {
            $table->id();
            $table->string('CreateCompany');
            $table->string('DispalyName');
            $table->string('Address1');
            $table->string('Address2');
            $table->string('City');
            $table->string('State');
            $table->string('Zipcode');
            $table->string('Country');
            $table->string('BillingAddress1');
            $table->string('BillingAddress2');
            $table->string('BillingCity');
            $table->string('BillingState');
            $table->string('BillingZip');
            $table->string('Phone1');
            $table->string('Phone2');
            $table->string('Fax');
            $table->string('status');
            $table->string('Disclaimer');
            $table->string('document');
            $table->string('logo');
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
        Schema::dropIfExists('company');
    }
};