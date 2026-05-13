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
        Schema::create('features', function (Blueprint $table) {
          $table->id();

            $table->string('title');
            $table->text('description')->nullable();

            $table->string('image')->nullable();

            // FontAwesome icon
            $table->string('icon')->nullable();

            // e.g feature-icon-green
            $table->string('icon_color')->nullable();

            // normal | wide | showcase
            $table->enum('layout', [
                'normal',
                'wide',
                'showcase'
            ])->default('normal');

            // overlay for showcase cards
            $table->string('overlay_title')->nullable();
            $table->text('overlay_description')->nullable();

            $table->integer('position')->default(0);
            $table->boolean('is_active')->default(true);

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
        Schema::dropIfExists('features');
    }
};
