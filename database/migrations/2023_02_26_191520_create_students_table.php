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
            $table->bigInteger('user_id')->nullable();
            $table->bigInteger('student_type_id')->nullable();
            $table->string('plwd_number')->nullable();
            $table->date('dob')->nullable();
            $table->string("identity_number")->nullable();
            $table->unsignedBigInteger("sublocation_id");
            $table->unsignedBigInteger("stundent_type_id");
            $table->string('gender')->nullable();
            $table->string('village')->nullable();
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
