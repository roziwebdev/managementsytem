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
        Schema::create('inventories', function (Blueprint $table) {
            $table->id();
            $table->string('created');
            $table->string('dept');
            $table->string('pic');
            $table->string('item');
            $table->string('qty');
            $table->string('specs');
            $table->string('size');
            $table->string('type');
            $table->string('unit');
            $table->string('tanggalbeli');
            $table->string('po');
            $table->string('vendor');
            $table->string('remarks');
            $table->string('lokasi');
            $table->string('garansi');
            $table->string('maintenance');
            $table->string('itipdevice');
            $table->string('itram');
            $table->string('itos');
            $table->string('ituser');
            $table->string('ithdd');
            $table->string('itip');
            $table->string('itmerk');
            $table->string('statuspemakaian');
            $table->string('safetystock');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('inventories');
    }
};
