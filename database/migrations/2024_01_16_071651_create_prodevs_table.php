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
            $table->text('job')->nullable();
            $table->text('statusjob')->nullable();
            $table->text('status')->nullable();
            $table->text('tanggaljob')->nullable();
            $table->text('original')->nullable();
            $table->text('design')->nullable();
            $table->text('tanggalterima')->nullable();
            $table->text('designno')->nullable();
            $table->text('namalayout')->nullable();
            $table->text('filelayout')->nullable();
            $table->text('statusdesign')->nullable();
            $table->text('actcolor')->nullable();
            $table->text('f1')->nullable();
            $table->text('f2')->nullable();
            $table->text('f3')->nullable();
            $table->text('f4')->nullable();
            $table->text('f5')->nullable();
            $table->text('f6')->nullable();
            $table->text('b1')->nullable();
            $table->text('b2')->nullable();
            $table->text('b3')->nullable();
            $table->text('b4')->nullable();
            $table->text('b5')->nullable();
            $table->text('b6')->nullable();
            $table->text('finishingjob')->nullable();
            $table->text('acuanwarna')->nullable();
            $table->text('packing')->nullable();
            $table->text('nops')->nullable();
            $table->text('boxname')->nullable();
            $table->text('boxspecs')->nullable();
            $table->text('boxsize')->nullable();
            $table->text('nwbox')->nullable();
            $table->text('nwpcs')->nullable();
            $table->text('estimasipackaging')->nullable();
            $table->text('boxdalampanjang')->nullable();
            $table->text('boxdalamlebar')->nullable();
            $table->text('boxdalamtinggi')->nullable();
            $table->text('boxluarpanjang')->nullable();
            $table->text('boxluarlebar')->nullable();
            $table->text('boxluartinggi')->nullable();
            $table->text('effective')->nullable();
            $table->text('preparedate')->nullable();
            $table->text('suplier')->nullable();
            $table->text('isi')->nullable();
            $table->text('isiboxsap')->nullable();
            $table->text('sapataubendel')->nullable();
            $table->text('susunan')->nullable();
            $table->text('gambar1')->nullable();
            $table->text('gambar2')->nullable();
            $table->text('gambar3')->nullable();
            $table->text('gambar4')->nullable();
            $table->text('gambar5')->nullable();
            $table->text('notepackaging')->nullable();
            $table->text('aplikasi')->nullable();
            $table->text('layout')->nullable();
            $table->text('ukpresslayout')->nullable();
            $table->text('mat1')->nullable();
            $table->text('mat2')->nullable();
            $table->text('mat3')->nullable();
            $table->text('specsmat1')->nullable();
            $table->text('specsmat2')->nullable();
            $table->text('specsmat3')->nullable();
            $table->text('as1')->nullable();
            $table->text('as2')->nullable();
            $table->text('as3')->nullable();
            $table->text('pisau')->nullable();
            $table->text('citto')->nullable();
            $table->text('emboss')->nullable();
            $table->text('hotprint')->nullable();
            $table->text('note1')->nullable();
            $table->text('note2')->nullable();
            $table->text('note3')->nullable();
            $table->text('up')->nullable();
            $table->text('nosc')->nullable();
            $table->text('gensc')->nullable();
            $table->text('po')->nullable();
            $table->text('fileponoprice')->nullable();
            $table->text ('tanggalpo')->nullable();
            $table->text('scode')->nullable();
            $table->text('address')->nullable();
            $table->text('customer')->nullable();
            $table->text('idcust')->nullable();
            $table->text('npwp')->nullable();
            $table->text('plantcode')->nullable();
            $table->text('client')->nullable();
            $table->text('product')->nullable();
            $table->text('sap')->nullable();
            $table->text('material')->nullable();
            $table->text('specs')->nullable();
            $table->text('size')->nullable();
            $table->text('finishing')->nullable();
            $table->text('qty')->nullable();
            $table->text('unit')->nullable();
            $table->text('price')->nullable();
            $table->text('total')->nullable();
            $table->text('createdsc')->nullable();
            $table->text('updatedsc')->nullable();
            $table->text('etauser')->nullable();
            $table->text('toleransi')->nullable();
            $table->text('statusproduct')->nullable();
            $table->text('notesc')->nullable();
            $table->text('noteedit')->nullable();
            $table->text('created')->nullable();
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
