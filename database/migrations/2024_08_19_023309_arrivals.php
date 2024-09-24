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
        Schema::create('arrivals', function (Blueprint $table) {
            $table->id();
            $table->integer('po');
            $table->string('item');
            $table->string('sjimage');
            $table->string('arrivalqty');
            $table->string('tanggalbeli');
            $table->string('qty');
            $table->string('unit');
            $table->string('type');
            $table->string('dept');
            $table->string('specs');
            $table->string('size');
            $table->string('created');
            $table->string('nomorsj');
            $table->string('status');
            $table->string('remarks');
            $table->string('notesj');
            $table->string('note');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('arrivals');
    }
};
