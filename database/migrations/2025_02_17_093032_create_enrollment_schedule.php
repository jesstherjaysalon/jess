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
        DB::table("enrollment_schedule")->insert([
            [
                'School_Year' => '2024-2025',
                'Semester' => 'First',
                'Enroll_month' => 'June',
                'Year_level' => '3',
                'Status' => 'Open',
                'Max_participants_per_day' => 13,


            ],
            [
                'School_Year' => '2025-2026',
                'Semester' => 'Second',
                'Enroll_month' => 'June',
                'Year_level' => '3',
                'Status' => 'Closed',
                'Max_participants_per_day' => 13,

            ],
            [
                'School_Year' => '2026-2027',
                'Semester' => 'Summer',
                'Enroll_month' => 'June',
                'Year_level' => '3',
                'Status' => 'Pending',
                'Max_participants_per_day' => 13,

            ],
        ]);



    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('enrollment_schedule');
    }
};
