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
        Schema::create('non_attendance_days', function (Blueprint $table) {
            $table->string('type')->default('holiday');
            // specific date (nullable for recurring rules like weekends)
            $table->date('date')->nullable();
            // optional: recurring weekday (0=Sunday ... 6=Saturday)
            $table->integer('weekday')->nullable();
            $table->string('title')->nullable();
            $table->boolean('is_recurring')->default(false);
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
        Schema::dropIfExists('non_attendance_days');
    }
};
