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
        Schema::table('teachers', function (Blueprint $table) {
            $table->string('pwd_status')->nullable();
            $table->string('disability_type')->nullable();
            $table->string('impairment_details')->nullable();
            $table->string('pwd_number')->nullable();
            $table->string('ethnicity_id')->nullable();
            $table->string('job_group_id')->nullable();
            $table->string('county_id')->nullable();
            $table->string('subcounty_id')->nullable();
            $table->string('ward_id')->nullable();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('teachers', function (Blueprint $table) {
            //
        });
    }
};
