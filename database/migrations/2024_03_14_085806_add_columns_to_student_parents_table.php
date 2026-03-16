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
            // Drop existing foreign key constraint and column
            $table->dropForeign(['student_id']);
            $table->dropColumn('student_id');

            // Add new foreign key column referencing student_details table
            $table->foreignId('student_details_id')->constrained('student_details')->onDelete('cascade');
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
