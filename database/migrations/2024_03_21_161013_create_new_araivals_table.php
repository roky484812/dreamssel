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
        Schema::create('new_araivals', function (Blueprint $table) {
            $table->id();
            $table->string('large_potrait');
            $table->string('large_landscape');
            $table->string('lsm_potrait');
            $table->string('rsm_potrait');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('new_araivals');
    }
};
