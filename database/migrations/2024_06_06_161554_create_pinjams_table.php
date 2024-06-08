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
        Schema::create('pinjams', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('anggota_id');
            $table->string('invoice');
            $table->double('bunga');
            $table->date('tgl_pinjam');
            $table->date('tgl_tenggat');
            $table->double('total');
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('anggota_id')->references('id')->on('anggotas');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pinjams');
    }
};
