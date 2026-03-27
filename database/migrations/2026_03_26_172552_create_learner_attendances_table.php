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
        Schema::create('learner_attendances', function (Blueprint $table) {
            $table->id();

            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->foreignId('learner_id')->constrained()->cascadeOnDelete();

            $table->date('date')->nullable();

            // present or absent
            $table->enum('status', ['present', 'absent']);

            // only used if absent
            $table->text('reason')->nullable();

            $table->timestamps();

            // prevent duplicate marking per day
            // $table->unique(['learner_id', 'date']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('learner_attendances');
    }
};
