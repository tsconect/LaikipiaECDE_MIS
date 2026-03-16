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
        Schema::create('student_applications', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('student_id')->nullable();
            $table->string('name')->nullable();
            $table->string('type')->nullable();
            $table->bigInteger('county_id')->nullable();
            $table->string('ac_no')->nullable();
            $table->string('bank')->nullable();
            $table->string('tel_no')->nullable();
            $table->string('address')->nullable();
            $table->string('code')->nullable();
            $table->string('town')->nullable();
            $table->string('branch_name')->nullable();
            $table->string('admission_number')->nullable();
            $table->string('year_of_study')->nullable();
            $table->bigInteger('total_fees')->default(0);
            $table->bigInteger('paid')->default(0);
            $table->bigInteger('balance')->default(0);
            $table->string('program')->nullable();
           // $table->bigInteger('year_of_study')->default(0);
           // $table->string('type')->nullable();
            $table->bigInteger('ward_id')->default(0);
            $table->string('sub_location')->nullable();


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
        Schema::dropIfExists('student_applications');
    }
};
