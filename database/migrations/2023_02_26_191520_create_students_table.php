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
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('middle_name')->nullable();

          
              $table->string('pwd_status')->nullable();
            $table->string('disability_type')->nullable();
            $table->string('impairment_details')->nullable();
            $table->date('dob')->nullable();
            $table->string("reg_number")->nullable();
            $table->unsignedBigInteger("sub_location_id")->nullable();
              $table->unsignedBigInteger("ward_id")->nullable();
            $table->unsignedBigInteger("student_type_id")->nullable();
            $table->string('gender')->nullable();
            $table->string('village')->nullable();
            $table->string('school_id')->nullable();
              $table->string('passport_photo')->nullable();
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
        Schema::dropIfExists('students');
    }
};
