<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('ride_id');
            $table->foreign('ride_id')->references('id')->on('rides');
            $table->string('amount');  // Payment amount
            $table->string('payment_method');  // Method used for payment (e.g., card, cash)
            $table->enum('status', ['pending', 'completed', 'failed'])->default('pending');  // Payment status
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payments');
    }
};
