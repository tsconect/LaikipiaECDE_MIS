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
        Schema::create('depart_ment_workers', function (Blueprint $table) {
            $table->bigIncrements('id');
            // Personal details
            // Full Names
            $table->string('full_names');
            // Email Address
            $table->string('email')->unique();
            // Phone Number
            $table->string('phone_number')->unique();
            // ID Number
            $table->string('id_number')->unique();
            // Kra Pin
            $table->string('kra_pin');
            // Gender
            $table->string('gender');
            // Date of Birth (not less than 18 years of Age)
            $table->date('dob');
            // Religion (Christian, Muslim, Pagan, Hiddu, other )
            $table->string('religion');
            // Passport size photo attachment.
            $table->string('passport_photo_attachment');

            $table->unsignedBigInteger('constituency_id');
            // Ward
            $table->unsignedBigInteger('ward_id');
            // Sublocation - Selection from Pre-existing List
            $table->unsignedBigInteger('sublocation_id');
            // Village
            $table->string('village');
            // Full Names
            $table->string('next_of_kin_full_names');
            // ID number
            $table->string('next_of_kin_id_number');
            // Phone number
            $table->string('next_of_kin_phone_number');
            // Relationship (Parent - Mother father, Partner - Husband, wife, sibling - brother, sister, religious Leader Etc)
            $table->string('next_of_kin_relationship');
            // Gender
            $table->string('next_of_kin_gender');

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
        Schema::dropIfExists('depart_ment_workers');
    }
};
