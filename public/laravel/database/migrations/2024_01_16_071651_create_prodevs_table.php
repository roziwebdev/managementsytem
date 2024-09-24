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
        Schema::create('prodevs', function (Blueprint $table) {
            $table->id();
            $table->string('job')->nullable();
            $table->string('statusjob')->nullable();
            $table->string('tanggaljob')->nullable();
            $table->string('original')->nullable();
            $table->string('design')->nullable();
            $table->string('tanggalterima')->nullable();
            $table->string('designno')->nullable();
            $table->string('statusdesign')->nullable();
            $table->string('actcolor')->nullable();
            $table->string('f1')->nullable();
            $table->string('f2')->nullable();
            $table->string('f3')->nullable();
            $table->string('f4')->nullable();
            $table->string('f5')->nullable();
            $table->string('f6')->nullable();
            $table->string('b1')->nullable();
            $table->string('b2')->nullable();
            $table->string('b3')->nullable();
            $table->string('b4')->nullable();
            $table->string('b5')->nullable();
            $table->string('b6')->nullable();
            $table->string('finishingjob')->nullable();
            $table->string('acuanwarna')->nullable();
            $table->string('packing')->nullable();
            $table->string('nops')->nullable();
            $table->string('boxname')->nullable();
            $table->string('boxspecs')->nullable();
            $table->string('boxsize')->nullable();
            $table->string('nwbox')->nullable();
            $table->string('aplikasi')->nullable();
            $table->string('layout')->nullable();
            $table->string('ukpresslayout')->nullable();
            $table->string('mat1')->nullable();
            $table->string('mat2')->nullable();
            $table->string('mat3')->nullable();
            $table->string('as1')->nullable();
            $table->string('as2')->nullable();
            $table->string('as3')->nullable();
            $table->string('pisau')->nullable();
            $table->string('citto')->nullable();
            $table->string('emboss')->nullable();
            $table->string('hotprint')->nullable();
            $table->string('note1')->nullable();
            $table->string('note2')->nullable();
            $table->string('note3')->nullable();
            $table->longText('up')->nullable();

            //sales
            $table->longText('nosc')->nullable();
            $table->longText('po')->nullable();
            $table->longText ('tanggalpo')->nullable();
            $table->longText('scode')->nullable();
            $table->longText('address')->nullable();
            $table->longText('customer')->nullable();
            $table->longText('plantcode')->nullable();
            $table->longText('client')->nullable();
            $table->longText('product')->nullable();
            $table->longText('sap')->nullable();
            $table->longText('material')->nullable();
            $table->longText('specs')->nullable();
            $table->longText('size')->nullable();
            $table->longText('finishing')->nullable();
            $table->longText('qty')->nullable();
            $table->longText('unit')->nullable();
            $table->longText('etauser')->nullable();
            $table->longText('toleransi')->nullable();
            $table->longText('notesc')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('prodevs');
    }
};
