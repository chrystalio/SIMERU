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
        Schema::create('klien', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email');
            $table->string('address');
            $table->string('phone');
            $table->unsignedBigInteger('proyek_id');
            $table->timestamps();

            $table->foreign('proyek_id')->references('id')->on('proyek')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('klien');
    }
};
