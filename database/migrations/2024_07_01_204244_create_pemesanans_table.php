<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pemesanans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->foreignId('admin_id');
            $table->string('transaction_id');
            $table->double('total');
            $table->enum('transaction_status', ['menunggu pembayaran','menunggu konfirmasi', 'terbayar', 'pembayaran ditolak', 'dibatalkan']);
            $table->string('nama_bank')->nullable();
            $table->string('no_bank')->nullable();
            $table->string('pemilik_bank')->nullable();
            $table->text('bukti_bayar')->nullable();
            $table->datetime('tanggal_bayar')->nullable();
            $table->text('keterangan')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pemesanans');
    }
};
