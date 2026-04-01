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
        Schema::table('learner_parents', function (Blueprint $table) {
            $table->string('county_id')->nullable();
                $table->string('sub_county_id')->nullable();
               
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('=learners', function (Blueprint $table) {
            //
        });
    }
};
