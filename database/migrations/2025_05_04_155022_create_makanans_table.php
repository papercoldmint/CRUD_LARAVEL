<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('makanans', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->text('deskripsi');
            $table->decimal('harga', 10, 2);
            $table->string('kategori');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('makanans');
    }
};