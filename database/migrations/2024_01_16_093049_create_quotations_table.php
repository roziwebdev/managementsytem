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
        Schema::create('quotations', function (Blueprint $table) {
            $table->id();
            $table->string('customer');
            $table->string('alamat');
            $table->string('seller');
            $table->string('product');
            $table->string('material');
            $table->string('specs');
            $table->string('size');
            $table->string('qty');
            $table->string('unit');
            $table->string('price');
            $table->string('qty2');
            $table->string('price2');
            $table->string('qty3');
            $table->string('price3');
            $table->string('status');
            $table->string('statusitem');
            $table->string('po');
            $table->string('noteitem');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('quotations');
    }
};
