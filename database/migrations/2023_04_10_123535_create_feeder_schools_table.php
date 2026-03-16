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
        Schema::create('feeder_schools', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string("school_name");
            $table->string("number_of_classes");
            $table->string("class_rooms_status");
            $table->unsignedBigInteger("constituency");
            $table->unsignedBigInteger("ward");
            $table->string("school_contact_first_name");
            $table->string("school_contact_middle_name");
            $table->string("school_contact_last_name");
            $table->string("school_contact_designation");
            $table->string("school_contact_tsc_number");
            $table->string("school_contact_id_number");
            $table->string("school_contact_phone_number");
            $table->string("school_contact_gender");
            $table->integer("number_of_students");
            // $table->integer("number_of_teachers");
            $table->string('remarks');
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
        Schema::dropIfExists('feeder_schools');
    }
};
