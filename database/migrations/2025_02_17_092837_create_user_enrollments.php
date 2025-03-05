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
        Schema::create('user_enrollments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('User_id');
            $table->string('Fullname', 50);
            $table->integer('Phone_Number');
            $table->string('Address', 50);
            $table->integer('age');
            $table->timestamps();

            $table->foreign("User_id")->references("id")->on("accounts")->onDelete("cascade")->onUpdate("cascade");
        });

        DB::table("user_enrollments")->insert([
            [
                'User_id' => 1,
                'Fullname' => 'Jessther jay salon',
                'Phone_Number' => 123,
                'Address' => 'opol',
                'age' => 13

            ],
            [
                'User_id' => 2,
                'Fullname' => 'Tantan',
                'Phone_Number' => 123,
                'Address' => 'opol',
                'age' => 13

            ],
            [
                'User_id' => 3,
                'Fullname' => 'Rorons',
                'Phone_Number' => 123,
                'Address' => 'opol',
                'age' => 13

            ],
        ]);
    }

    

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_enrollments');
    }
};
