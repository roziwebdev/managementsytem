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
        Schema::create('lemburs', function (Blueprint $table) {
            $table->id();
            $table->string('tgllembur');
            $table->string('departement');
            $table->string('namakaryawan');
            $table->string('jabatan');
            $table->string('mulai');
            $table->string('istirahat');
            $table->string('berakhir');
            $table->string('pekerjaan');
            $table->string('keteranganpekerjaan');
            $table->string('hasillembur');
            $table->string('pemberiperintah');
            $table->string('estimasi');
            $table->string('totaljam');
            $table->string('unit');
            $table->string('status');
            $table->string('note');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lemburs');
    }
};
