<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::create('komentars', function (Blueprint $table) {
        $table->id();
        $table->unsignedBigInteger('produk_id');
        $table->string('nama');
        $table->text('komentar');
        $table->integer('rating'); // nilai dari 1–5
        $table->timestamps();

        $table->foreign('produk_id')->references('id')->on('produks')->onDelete('cascade');
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('komentars');
    }
};
