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
        Schema::create('contact_person', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('posisi')->nullable()->default('-');
            $table->string('nomor');
            $table->string('email')->nullable()->default('-');
            $table->string('foto')->nullable()->default('-');
            $table->string('deskripsi')->nullable()->default('-');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contact_person');
    }
};
