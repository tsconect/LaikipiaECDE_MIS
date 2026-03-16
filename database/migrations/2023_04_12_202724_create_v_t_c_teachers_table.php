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
        Schema::create('v_t_c_teachers', function (Blueprint $table) {
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
            // TSC - Number.
            $table->string('tsc_number')->nullable();
            // Religion (Christian, Muslim, Pagan, Hiddu, other )
            $table->string('religion');
            // Passport size photo attachment.
            $table->string('passport_photo_attachment');

            // Residential details
            // Constituency of Origin
            $table->unsignedBigInteger('constituency_id');
            // Ward
            $table->unsignedBigInteger('ward_id');
            // Sublocation - Selection from Pre-existing List
            $table->unsignedBigInteger('sublocation_id');
            // Village
            $table->string('village');
            // School one is posted into - Select (Predefined details already in the VTC school)
            $table->unsignedBigInteger('school_id');

            // These are the Unions ( One can be in more than one Union ) select box

            // KNUT
            // KUPPET
            // OTHER - IF OTHER HAVE A FIELD TO WRITE THAT
            // NONE
            // Education Level (Pdf to be upload as one - combined)
            $table->unsignedBigInteger('union_id');

            // Attachment of the following papers

            // Degree
            // Diploma
            // Certificate
            // Form Four Certificate
            // None of the Above
            $table->string('education_level');
            $table->string('certification_attachment');

            // NEXT OF KIN

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
        Schema::dropIfExists('v_t_c_teachers');
    }
};
