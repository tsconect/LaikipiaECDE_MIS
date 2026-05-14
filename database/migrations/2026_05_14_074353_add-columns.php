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
        Schema::table('ecde_schools', function (Blueprint $table) {
            // sub-location-id
            // $table->string('sub_location_id')->nullable();
            $table->string('reg_number')->nullable();
            $table->string('feeder_school')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('ecde_schools', function (Blueprint $table) {
            //
        });
    }
};
