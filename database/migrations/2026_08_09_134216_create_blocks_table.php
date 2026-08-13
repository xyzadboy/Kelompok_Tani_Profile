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
        Schema::create('blocks', function (Blueprint $table) {
            $table->id();
            $table->string('kode_blok', 20)->unique()->comment('Kode Blok seperti BLK-001');
            $table->string('penanggung_jawab', 100)->comment('Penanggung Jawab/Pengelola');
            $table->decimal('luas', 10, 2)->comment('Luas lahan dalam Hektar');
            $table->string('komoditas', 100)->comment('Komoditas Utama');
            $table->decimal('latitude', 10, 8)->comment('Koordinat Latitude');
            $table->decimal('longitude', 11, 8)->comment('Koordinat Longitude');
            $table->text('deskripsi')->nullable()->comment('Deskripsi tambahan');
            $table->string('status', 20)->default('aktif')->comment('aktif, nonaktif, perawatan');
            $table->string('telepon', 20)->nullable()->comment('Nomor telepon pengelola');
            $table->string('alamat', 255)->nullable()->comment('Alamat lengkap');
            $table->date('tanggal_tanam')->nullable()->comment('Tanggal penanaman');
            $table->date('tanggal_panen')->nullable()->comment('Tanggal perkiraan panen');
            $table->timestamps();

                        // Index untuk performa query
            $table->index('kode_blok');
            $table->index('penanggung_jawab');
            $table->index('status');
            $table->index(['latitude', 'longitude']);
        });


    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('blocks');
    }
};
