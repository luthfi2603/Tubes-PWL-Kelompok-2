<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(){
        Schema::create('pembelian_produks', function (Blueprint $table) {
            $table->id();
            $table->string('pembelian_id', 11);
            $table->foreign('pembelian_id')->references('id_pembelian')->on('pembelians')->onDelete('restrict');
            $table->string('image');
            $table->foreignId('product_id');
            $table->string('nama');
            $table->integer('jumlah');
            $table->string('harga', 100);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(){
        Schema::dropIfExists('pembelian_produks');
    }
};