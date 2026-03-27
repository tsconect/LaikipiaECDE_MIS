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
        Schema::create('ecde_schools', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string("school_name")->nullable();
            $table->string("number_of_classes")->nullable();
            $table->string("class_rooms_status")->nullable();
            $table->string('county_id')->nullable();
            $table->string('subcounty_id')->nullable();

            $table->string("feeder_id")->nullable();
            $table->string("ward_id")->nullable();
            $table->string("teacher_id")->nullable();
           
            $table->integer("number_of_students")->nullable();
            $table->string('school_location')->nullable();
            $table->text('remarks')->nullable();
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
        Schema::dropIfExists('ecde_schools');
    }
};
