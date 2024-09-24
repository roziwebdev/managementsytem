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
        Schema::create('productsales', function (Blueprint $table) {
            $table->id();
            $table->string('product');
            $table->string('customer');
            $table->string('specs');
            $table->string('size');
            $table->string('material');
            $table->string('sap');
            $table->string('finishing');
            $table->string('unit');
            $table->string('toleransi');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('productsales');
    }
};
