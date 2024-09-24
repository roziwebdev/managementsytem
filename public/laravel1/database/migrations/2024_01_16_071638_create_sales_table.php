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
            $table->longText('po')->nullable();
            $table->longText ('tanggalpo')->nullable();
            $table->longText('scode')->nullable();
            $table->longText('address')->nullable();
            $table->longText('customer')->nullable();
            $table->longText('client')->nullable();
            $table->longText('plantcode')->nullable();
            $table->longText('product')->nullable();
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
