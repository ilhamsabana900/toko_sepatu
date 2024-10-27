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
    Schema::create('transactions', function (Blueprint $table) {
        $table->id();
        $table->unsignedBigInteger('user_id');
        $table->unsignedBigInteger('product_id');
        $table->decimal('total_harga', 10, 2);
        $table->string('status')->default('pending'); // Contoh status: pending, selesai, batal
        $table->timestamp('tanggal_transaksi')->useCurrent();
        $table->string('snap_token')->nullable();
        $table->timestamps();

        // Relasi dengan tabel user
        $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

        // Relasi dengan table product
        $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
    });
}


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transactions');
    }
};
