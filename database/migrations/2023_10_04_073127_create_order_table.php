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
        Schema::create('tb_order', function (Blueprint $table) {
            $table->id();
            $table->string('no_order')->unique();
            $table->unsignedBigInteger('customer_id');
            $table->text('alamat');
            $table->float('total_harga');
            $table->text('catatan')->nullable();
            $table->text('status');
            $table->timestamps();

            $table->foreign('customer_id')->references('id')->on('customers')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tb_order');
    }
};
