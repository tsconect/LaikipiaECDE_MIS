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
       Schema::create('s_m_s', function (Blueprint $table) {
            $table->id();
            $table->string('phone_number')->nullable();
            $table->string('message')->nullable();
            $table->string('created_by')->nullable();
            $table->string('status')->nullable();
            $table->string('date_sent')->nullable();
             $table->string('cost')->nullable();
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
        Schema::dropIfExists('s_m_s');
    }
};
