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
        Schema::create('tenders', function (Blueprint $table) {
            $table->id();
            $table->string('idplant');
            $table->string('namatender');
            $table->string('referensi');
            $table->string('sap');
            $table->string('product');
            $table->string('specs');
            $table->string('quantity');
            $table->string('unit');
            $table->string('sisa');
            $table->string('harga');
            $table->string('totalharga');
            $table->string('historysap');
            $table->string('histoyproduct');
            $table->string('datetender');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tenders');
    }
};