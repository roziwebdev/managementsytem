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
        Schema::create('sales', function (Blueprint $table) {
            $table->id();
            $table->string('idquotation')->nullable();
            $table->string('gensc')->nullable();
            $table->longText('po')->nullable();
            $table->longText ('tanggalpo')->nullable();
            $table->longText('scode')->nullable();
            $table->longText('address')->nullable();
            $table->longText('customer')->nullable();
            $table->longText('idcust')->nullable();
            $table->longText('npwp')->nullable();
            $table->longText('up')->nullable();
            $table->longText('plantcode')->nullable();
            $table->longText('product')->nullable();
            $table->longText('tanggalproduct')->nullable();
            $table->longText('sap')->nullable();
            $table->longText('material')->nullable();
            $table->longText('specs')->nullable();
            $table->longText('size')->nullable();
            $table->longText('finishing')->nullable();
            $table->longText('qty')->nullable();
            $table->longText('unit')->nullable();
            $table->longText('price')->nullable();
            $table->longText('total')->nullable();
            $table->longText('etauser')->nullable();
            $table->longText('toleransi')->nullable();
            $table->longText('notesc')->nullable();
            $table->longText('job')->nullable();
            $table->longText('statusjob')->nullable();
            $table->longText('dp')->nullable();
            $table->longText('persen')->nullable();
            $table->longText('selisih')->nullable();
            $table->longText('jumlahkirim')->nullable();
            $table->longText('nosj')->nullable();
            $table->longText('statussc')->nullable();
            $table->longText('statuproduct')->nullable();
            $table->longText('keterangancust')->nullable();
            $table->longText('noteeksternal')->nullable();
            $table->longText('keteranganpembayaran')->nullable();
            $table->longText('tender')->nullable();
            $table->longText('etapilihan')->nullable();
            $table->longText('filepo')->nullable();
            $table->longText('filehitunganharga')->nullable();
            $table->longText('fileponoprice')->nullable();
            $table->longText('sellerowner')->nullable();
            $table->longText('jobsc')->nullable();
            $table->longText('idplant')->nullable();
            $table->longText('referensi')->nullable();
            $table->longText('lastprice')->nullable();
            $table->longText('lastqty')->nullable();
            $table->longText('lastorder')->nullable();
            $table->longText('lastsc')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sales');
    }
};
