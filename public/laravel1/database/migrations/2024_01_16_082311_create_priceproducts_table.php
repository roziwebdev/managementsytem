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
        Schema::create('priceproducts', function (Blueprint $table) {
            $table->id();
            $table->string('tanggal')->nullable();
            $table->string('product')->nullable();
            $table->string('specs')->nullable();
            $table->string('size')->nullable();
            $table->string('customer')->nullable();
            $table->string('po')->nullable();
            $table->string('harga')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('priceproducts');
    }
};
