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
        Schema::create('temp_users', function (Blueprint $table) {
            $table->id();            
            $table->string('username')->unique();
            $table->string('email')->unique();
            $table->unsignedBigInteger('role')->default(3);
            $table->string('password');
            $table->string('token')->unique();
            $table->timestamps();
            $table->foreign('role')->references('id')->on('user_roles');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('temp_users');
    }
};
