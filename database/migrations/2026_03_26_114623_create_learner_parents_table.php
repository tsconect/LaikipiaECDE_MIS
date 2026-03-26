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
        Schema::create('learner_parents', function (Blueprint $table) {
             $table->id();
            $table->foreignId('learner_id')->constrained()->cascadeOnDelete();
            // Names split
            $table->string('first_name')->nullable();
            $table->string('middle_name')->nullable();
            $table->string('last_name')->nullable();
            // Relationship (controlled values)
            $table->string('relationship')->nullable();
            $table->string('id_number')->nullable();
            $table->string('phone_number')->nullable();
            $table->string('alernative_phone_number')->nullable();
            $table->string('email')->nullable();
            $table->string('village')->nullable();
             $table->string('sub_location_id')->nullable();
            $table->string('ward_id')->nullable();
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
        Schema::dropIfExists('learner_parents');
    }
};
