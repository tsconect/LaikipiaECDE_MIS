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
         Schema::create('system_activity_logs', function (Blueprint $table) {
            $table->id();
            $table->string('causer_id')->nullable();
            $table->string('ip_address')->nullable();
            $table->string('network')->nullable();
            $table->string('subject_id')->nullable();
            $table->string('action')->nullable();
            $table->string('event')->nullable();
            $table->text('description')->nullable();
            $table->text('asset_url')->nullable();
            $table->json('current_object')->nullable();
            $table->json('new_object')->nullable();
            $table->text('type')->nullable();

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
        Schema::dropIfExists('system_activity_logs');
    }
};
