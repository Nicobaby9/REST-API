<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePinjamenTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pinjamen', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->date('tanggal_peminjaman');
            $table->date('tanggal_batas_peminjaman');
            $table->date('tanggal_pengembalian');
            $table->boolean('status_ontime');

            $table->unsignedBigInteger('mahasiswa_id')->nullable();
            $table->foreign('mahasiswa_id')->references('id')->on('mahasiswas')->onDelete('cascade');

            $table->unsignedBigInteger('buku_id')->nullable();
            $table->foreign('buku_id')->references('id')->on('bukus')->onDelete('cascade');

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
        Schema::dropIfExists('pinjamen');
    }
}
