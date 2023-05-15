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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('nama', 40);
            $table->string('username', 30)->unique();
            $table->string('email', 50)->unique();
            $table->string('image', 60);
            $table->enum('gender', ['Pria', 'Wanita']);
            $table->text('alamat');
            $table->string('kota', 40);
            $table->string('provinsi', 40);
            $table->string('kode_pos', 20);
            $table->string('no_hp', 20);
            $table->integer('level');
            $table->string('password');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(){
        Schema::dropIfExists('users');
    }
};