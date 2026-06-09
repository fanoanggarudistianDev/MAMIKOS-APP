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
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->string('nama_kos')->default('Kos Kami');
            $table->text('alamat_kos')->nullable();
            $table->string('telepon_kos')->nullable();
            $table->string('email_notifikasi')->nullable();
            $table->integer('tarif_default')->default(0);
            $table->text('deskripsi_kos')->nullable();
            $table->integer('tgl_jatuh_tempo_pembayaran')->default(1)->comment('Tanggal jatuh tempo pembayaran cicilan (1-31)');
            $table->text('policy_kos')->nullable();
            $table->string('status')->default('aktif');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('settings');
    }
};
