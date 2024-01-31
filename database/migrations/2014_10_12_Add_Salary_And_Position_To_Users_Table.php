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
        Schema::table('users', function (Blueprint $table) {
            $table->decimal('deductions', 10, 2)->nullable();
            $table->string('deductions_detail')->nullable();

            $table->time('overtime')->nullable();
            $table->time('latetime')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('deductions');
            $table->dropColumn('deductions_detail');
            $table->dropColumn('overtime');
            $table->dropColumn('latetime');
        });
    }
};
 