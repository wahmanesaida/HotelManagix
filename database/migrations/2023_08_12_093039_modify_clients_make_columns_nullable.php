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
        Schema::table('clients', function (Blueprint $table) {

            $table->string('phone')->nullable()->change();
            $table->string('CIN')->nullable()->change();
            $table->string('Address')->nullable()->change();
            $table->string('photo')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('clients', function (Blueprint $table) {

            $table->string('phone')->nullable(false)->change();
            $table->string('CIN')->nullable(false)->change();
            $table->string('Address')->nullable(false)->change();
            $table->string('photo')->nullable(false)->change();
        });

    }
};
