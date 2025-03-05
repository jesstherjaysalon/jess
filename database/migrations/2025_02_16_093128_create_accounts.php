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
        Schema::create('accounts', function (Blueprint $table) {
            $table->id();
            $table->string('email', 50);
            $table->string('password', 50);
            $table->timestamps();
        });

        DB::table("accounts")->insert([
            [
                'email' => 'jessther@gmail.com',
                'password' => '123'
            ],
            [
                'email' => 'tantan@gmail.com',
                'password' => '123'
            ],
            [
                'email' => 'rorons@gmail.com',
                'password' => '123'
            ],
        ]);
       
    
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('accounts');
    }
};
