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
        Schema::create('phase', function (Blueprint $table) {
            $table->id();
            $table->string('OwnerType');
            $table->string('Owner');
            $table->string('ProtpertyType');
            $table->string('PhaseName');
            $table->string('PhaseDescription');
            $table->string('ServiceFee');
            $table->string('ProtpertySubType');
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
        Schema::dropIfExists('phase');
    }
};