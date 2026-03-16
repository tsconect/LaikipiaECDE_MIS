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
        Schema::create('cheque_transactions', function (Blueprint $table) {
            $table->id();
            $table->string('transaction_type');
            $table->unsignedBigInteger('application_id')->nullable();
            $table->unsignedBigInteger('cheque_id');
            $table->decimal('amount', 10, 2);
            $table->decimal('balance', 10, 2);
            $table->timestamps();

            $table->foreign('application_id')->references('id')->on('student_applications')->onDelete('set null');
            $table->foreign('cheque_id')->references('id')->on('cheques')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cheque_transactions');
    }
};
