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
        Schema::create('order_details', function (Blueprint $table) {
            $table->id();
            $table->string('invoice');
            $table->string('status',0)->comment('0 = Belum Bayar','1 = Sudah Bayar','2 = Sudah Dikirim','3 = Sudah Diterima','4 = Dibatalkan');
            $table->integer('total_harga');
            $table->integer('user_id');
            $table->integer('subtotal');
            $table->integer('shipping_cost');
            $table->integer('berat');
            $table->string('nama');
            $table->string('phone');
            $table->string('kurir');
            $table->string('destination');
            $table->string('alamat');
            $table->string('layanan');


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
        Schema::dropIfExists('order_details');
    }
};
