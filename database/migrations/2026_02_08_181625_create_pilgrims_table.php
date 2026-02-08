<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('pilgrims', function (Blueprint $table) {
            $table->id();
            $table->uuid('public_id')->unique()->index();
            $table->string('name');
            $table->string('passport_number')->unique();
            $table->string('umrah_id')->unique();
            $table->string('ppiu');
            $table->string('hotel_name');
            $table->date('check_in');
            $table->date('check_out');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pilgrims');
    }
};
