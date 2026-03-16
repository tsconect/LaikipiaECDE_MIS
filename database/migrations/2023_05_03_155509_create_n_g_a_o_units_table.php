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
        Schema::create('n_g_a_o_units', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string("code")->unique();
            $table->string("name");
            $table->string("org_id")->unique();
            $table->string("parent_id");
            $table->unsignedBigInteger('level_id');
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
        Schema::dropIfExists('n_g_a_o_units');
    }
};
