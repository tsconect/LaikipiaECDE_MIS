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

    // Course name (Eg. Hairdressing)
    // Course Duration (2 Years)
    // Accomondative students per academic year (200 students)
    // Registration Prefix (eg. N11 - this will help when registering student to have the predefined Prefix)
    // Examination Body / Evaluation creteria
    // additional Description

        Schema::create('v_t_c_courses', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger("vtc_id");
            $table->unsignedBigInteger("vtc_dpt_id");
            $table->string("course_name");
            $table->string("duration");
            $table->string('capacity');
            $table->string('registration_code');
            $table->string('examination_body_or_creteria');
            $table->string('addtional_description');
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
        Schema::dropIfExists('v_t_c_courses');
    }
};
