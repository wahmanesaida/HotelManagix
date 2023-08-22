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
        Schema::table('reservations', function (Blueprint $table) {
            $table->date('checkin_date')->nullable();
            $table->date('checkout_date')->nullable();
            $table->enum('checkin', ['checked', 'unchecked'])->default('unchecked');
            $table->enum('checkout', ['checked', 'unchecked'])->default('unchecked');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('reservations', function (Blueprint $table) {
            $table->dropColumn(['checkin_date' ,'checkout_date', 'checkin', 'checkout']);
        });
    }
};
