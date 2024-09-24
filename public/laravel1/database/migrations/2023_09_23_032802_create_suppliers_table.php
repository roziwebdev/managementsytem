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
        Schema::create('suppliers', function (Blueprint $table) {
            $table->id();
            $table->string('jenis')->nullable();
            $table->string('supplier')->nullable();
            $table->string('cp')->nullable();
            $table->string('telp')->nullable();
            $table->string('leadtime')->nullable();
            $table->string('material')->nullable();
            $table->string('alamat')->nullable();
            $table->string('rekening')->nullable();
            $table->string('bank')->nullable();
            $table->string('email')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('suppliers');
    }
};
