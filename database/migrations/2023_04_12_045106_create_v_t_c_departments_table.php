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
    //     When Registering department ensure to have

    // Department Name
    // Departmental Capacity (number of students it can Accomondate)
    // Additional Description.


        Schema::create('v_t_c_departments', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('vtc_id');
            $table->string('department_name');
            $table->string('capacity');
            $table->string('additional_description');
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
        Schema::dropIfExists('v_t_c_departments');
    }
};
