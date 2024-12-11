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
        Schema::create('produks', function (Blueprint $table) {
            $table->id();
            $table->string("produk_foto");
            $table->string("produk_nama");
            $table->unsignedBigInteger("produk_id_cat");
            $table->integer("produk_harga");
            $table->integer("produk_stok");
            $table->timestamps();

            $table->foreign('produk_id_cat')->references('id')->on('categoris');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('produks');
    }
};
