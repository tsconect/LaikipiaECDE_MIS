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
        Schema::table('siblings', function (Blueprint $table) {
            // $table->dropColumn('DOB');
            $table->dropColumn('admission');


            // $table->date('dob')->nullable()->after('name');


            // $table->string('admission')->nullable()->after('dob');


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('student_parents', function (Blueprint $table) {
            //
        });
    }
};
