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
        Schema::create('book', function (Blueprint $table) {
            $table->id();
            $table->string('kode_barang');
            $table->string('kategori_barang');
            $table->string('status_barang');
            $table->string('status');
            $table->string('nama_barang');
            $table->string('kt_barang');
            $table->string('no_serial');
            $table->date('tgl_masuk');
            $table->string('terima_dari');
            $table->string('lokasi');
            $table->string('anydesk');
            $table->string('kt_email');
            $table->string('kp_name');
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
        Schema::dropIfExists('book');
    }
};
