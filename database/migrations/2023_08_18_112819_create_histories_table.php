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
        Schema::create('histories', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('reservation_id');
            $table->string('room_type');
            $table->string('room');
            $table->string('email');
            $table->string('CIN')->nullable();
            $table->dateTime('checkin_date');
            $table->dateTime('checkout_date');
            $table->string('payment_status');
            $table->timestamps();

            // Définir les clés étrangères
            $table->foreign('reservation_id')->references('id')->on('reservations');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('histories');
    }
};
