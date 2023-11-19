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
        Schema::create('tb_produk', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('toko_id');
            $table->unsignedBigInteger('kategori_produk_id');
            $table->string('nama');
            $table->string('slug');
            $table->text('deskripsi');
            $table->decimal('harga', 10, 2);
            $table->decimal('harga_diskon', 10, 2)->nullable();
            $table->integer('stok');
            $table->integer('berat');
            $table->string('image');
            $table->timestamps();

            $table->foreign('toko_id')->references('id')->on('tb_toko')->onDelete('cascade');
            $table->foreign('kategori_produk_id')->references('id')->on('tb_kategori_produk')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tb_produk');
    }
};
