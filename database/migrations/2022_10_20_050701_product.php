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
        Schema::create('product', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('brand_id');
            $table->unsignedBigInteger('gudang_id');
            $table->string('nama_produk');
            $table->integer('stok');
            $table->integer('harga');
            $table->timestamps();

            $table->foreign('brand_id')->references('id')->on('brand')->onDelete('cascade');
            $table->foreign('gudang_id')->references('id')->on('gudang')->onDelete('cascade');
        });
        //
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
};
