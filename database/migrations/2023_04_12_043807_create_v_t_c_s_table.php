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
        //     When Registering VTC Have the following.

        //     VTC Name
        //     Registration Number
        //     Location (Sublocation - Thus we shall have ward and Constituency)
        //     Area it occupys in HACTARES
        //     Legal Ownership (On a leased land, Goverment land or private)
        //     Infrastracture setup - (have a call to explain this on what we need have )

        // School contact person Name

        //     Designation
        //     Full names
        //     ID Number
        //     KRA Pin
        //     Phone Number
        //     TSC - Number
        //     P.o box


        Schema::create('v_t_c_s', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('registration_number');
            $table->string("area_in_hectares");
            $table->string('legal_ownership');
            $table->string('infrastracture');
            // School contact person Name
            $table->string('designation');
            $table->string('full_names');
            $table->string('id_number');
            $table->string('kra_pin');
            $table->string('phone_number');
            $table->string('tsc_number')->nullable();
            $table->string('p_o_box');

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
        Schema::dropIfExists('v_t_c_s');
    }
};
