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
        Schema::table('tb_kategori_produk', function (Blueprint $table) {
            $table->boolean('kategori_rekomendasi')->default(false)->after('image');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('tb_kategori_produk', function (Blueprint $table) {
            $table->dropColumn('kategori_rekomendasi');
        });
    }
};
