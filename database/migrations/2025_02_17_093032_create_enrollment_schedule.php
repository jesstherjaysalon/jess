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
        Schema::create('enrollment_schedule', function (Blueprint $table) {
            $table->id();
            $table->string('School_Year', 50);
            $table->string('Semester', 50);
            $table->string('Enroll_month', 50);
            $table->string('Year_level', 50);
            $table->string('Status', 50);
            $table->integer('Max_participants_per_day');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('enrollment_schedule');
    }
};
