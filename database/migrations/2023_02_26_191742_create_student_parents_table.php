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
        Schema::create('student_parents', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('student_id')->default(0);
            $table->string('name')->nullable();
            $table->string('id_number')->nullable();
            $table->string('phone')->nullable();
            $table->string("gender")->nullable();
            $table->string('occupation')->nullable();
            $table->string("disability_status")->nullable();
            $table->string("plwd_number")->nullable();
            $table->string("annex_doc")->nullable();
            $table->string("other_docs");
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
        Schema::dropIfExists('student_parents');
    }
};
