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
        Schema::create('teachers', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id')->nullable();
            $table->string('phone')->nullable();
            $table->string('id_number')->nullable();
            $table->string('kra_pin')->nullable();
            $table->string('gender')->nullable();
            $table->string('dob')->nullable();
            $table->string('tsc_number')->nullable();
            $table->string('image_path')->nullable();

            $table->string('next_kin_first_name')->nullable();
            $table->string('next_kin_last_name')->nullable();
            $table->string('next_kin_middle_name')->nullable();
            $table->string('next_kin_id_number')->nullable();
            $table->string('next_kin_phone')->nullable();
            $table->string('next_kin_relationship')->nullable();
            $table->string('next_kin_gender')->nullable();

            //new fields
            $table->string('school_id')->nullable();
            $table->string('ippd_number');
            $table->string('ethnicity');//
            $table->date("date_of_first_appointment"); // first employed
            $table->string("terms_of_engagement"); //
            $table->string('job_group'); // k -> r (select)


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
        Schema::dropIfExists('teachers');
    }
};
