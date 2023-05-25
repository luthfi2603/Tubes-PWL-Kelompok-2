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
        Schema::create('pembelians', function (Blueprint $table) {
            $table->string('id', 11)->primary();
            $table->foreignId('user_id');
            $table->string('nama_pembeli', 100);
            $table->date('tanggal_pembelian');
            $table->string('total_pembelian', 100);
            $table->string('e_money', 20);
            $table->string('e_money_number', 20);
            $table->string('status_pembayaran', 20);
            $table->string('status_pembelian', 20);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(){
        Schema::dropIfExists('pembelians');
    }
};