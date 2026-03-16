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
            $table->string("school_name");
            $table->string("number_of_classes");
            $table->string("class_rooms_status");
            $table->unsignedBigInteger("constituency");
            $table->unsignedBigInteger("feeder_id")->nullable();
            $table->unsignedBigInteger("ward");
            $table->string("school_contact_first_name");
            $table->string("school_contact_middle_name");
            $table->string("school_contact_last_name");
            $table->string("school_contact_designation");
            $table->string("school_contact_tsc_number")->nullable();
            $table->string("school_contact_id_number");
            $table->string("school_contact_phone_number");
            $table->string("school_contact_gender");
            $table->integer("number_of_students");
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
