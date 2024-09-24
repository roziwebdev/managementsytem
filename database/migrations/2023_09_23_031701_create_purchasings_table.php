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
        Schema::create('purchasings', function (Blueprint $table) {
            $table->id();
            $table->integer('idarrival')->nullable();
            $table->string('po')->nullable();
            $table->string('alamat')->nullable();
            $table->string('mrtanggal')->nullable();
            $table->string('podate')->nullable();
            $table->string('mrnumber')->nullable();
            $table->string('type')->nullable();
            $table->string('dept')->nullable();
            $table->string('etauser')->nullable();
            $table->string('etaauto')->nullable();
            $table->string('product')->nullable();
            $table->string('supplier')->nullable();
            $table->string('cp')->nullable();
            $table->longText('item')->nullable();
            $table->string('size')->nullable();
            $table->string('panjang')->nullable();
            $table->string('lebar')->nullable();
            $table->string('tinggi')->nullable();
            $table->string('specs')->nullable();
            $table->string('qty')->nullable();
            $table->string('unit')->nullable();
            $table->string('price')->nullable();
            $table->string('vat')->nullable();
            $table->string('ref')->nullable();
            $table->string('status')->nullable();
            $table->string('arvdate')->nullable();
            $table->string('arvqty')->nullable();
            $table->string('tanggalitem')->nullable();
            $table->string('image_path')->nullable();
            $table->string('barcode')->nullable();
            $table->string('approvalkadept_at')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('purchasings');
    }
};
