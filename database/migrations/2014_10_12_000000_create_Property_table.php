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
        Schema::create('property', function (Blueprint $table) {
            $table->id();
            $table->string('OwnerType');
            $table->string('Owner');
            $table->string('ProtpertyType');
            $table->string('PropertyName');
            $table->string('Location');
            $table->string('PropertyDiscription');
            $table->string('LandInformation');
            $table->string('Tenure');
            $table->string('Builder');
            $table->string('Architecture');
            $table->string('CertifyingAuthority');
            $table->string('Contact');
            $table->string('ReciptePrefix');
            $table->string('ServiceFee');
            $table->string('Zone');
            $table->string('Sector');
            $table->string('PlotNo');
            $table->string('map');
            $table->string('brochure');
            $table->string('image');
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
        Schema::dropIfExists('property');
    }
};