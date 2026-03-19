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

        Schema::create('coordinators', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id')->nullable();
            $table->string('id_number')->nullable();
            $table->string('kra_pin')->nullable();
            $table->string('gender')->nullable();
            $table->string('dob')->nullable();
         
            $table->string('image_path')->nullable();

           
            //new fields
            $table->string('school_id')->nullable();
            $table->string('ippd_number')->nullable();
         
            $table->date("date_of_first_appointment")->nullable();
            $table->string("terms_of_engagement")->nullable();
       

             $table->string('pwd_status')->nullable();
            $table->string('disability_type')->nullable();
            $table->string('impairment_details')->nullable();
            $table->string('pwd_number')->nullable();
            $table->string('ethnicity_id')->nullable();
            $table->string('job_group_id')->nullable();
            $table->string('county_id')->nullable();
            $table->string('subcounty_id')->nullable();
            $table->string('ward_id')->nullable();


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
        Schema::dropIfExists('coordinators');
    }
};
