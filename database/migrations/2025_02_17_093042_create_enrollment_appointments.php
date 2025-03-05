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
        Schema::create('enrollment_appointments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('enrollee_id');
            $table->unsignedBigInteger('enrollment_id');
            $table->integer('exam_day');
            $table->string('exam_time', 50);
            $table->enum('Status',["booked","cancel","pending"])->default("pending");
            $table->timestamps();

            $table->foreign("enrollee_id")->references("id")->on("accounts")->onDelete("cascade")->onUpdate("cascade");
            $table->foreign("enrollment_id")->references("id")->on("enrollment_schedule")->onDelete("cascade")->onUpdate("cascade");


        });

        DB::table("enrollment_appointments")->insert([
            [
                'enrollee_id' => 1,
                'enrollment_id' => 1,
                'exam_day' => 1,
                'exam_time' => 'AM',
                'Status' => 'booked'
                
            ],
            [
                'enrollee_id' => 2,
                'enrollment_id' => 2,
                'exam_day' => 1,
                'exam_time' => 'PM',
                'Status' => 'cancel'

            ],
            [
                'enrollee_id' => 3,
                'enrollment_id' => 3,
                'exam_day' => 1,
                'exam_time' => 'AM',
                'Status' => 'pending'

            ],
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('enrollment_appointments');
    }
};
