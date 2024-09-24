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
         Schema::create('designnumbers', function (Blueprint $table) {
            $table->id();
            $table->text('designno');
            $table->text('product');
            $table->text('sap');
            $table->text('original');
            $table->text('design');
            $table->text('actcolor');
            $table->text('statusorder');
            $table->text('f1');
            $table->text('f2');
            $table->text('f3');
            $table->text('f4');
            $table->text('f5');
            $table->text('f6');
            $table->text('b1');
            $table->text('b2');
            $table->text('b3');
            $table->text('b4');
            $table->text('b5');
            $table->text('b6');
            $table->text('finishingjob');
            $table->text('acuanwarna');
            $table->text('packing');
            $table->text('nops');
            $table->text('boxname');
            $table->text('boxspecs');
            $table->text('boxsize');
            $table->text('nwbox');
            $table->text('nwpcs');
            $table->text('estimasipackaging');
            $table->text('boxdalampanjang');
            $table->text('boxdalamlebar');
            $table->text('boxdalamtinggi');
            $table->text('boxluarpanjang');
            $table->text('boxluarlebar');
            $table->text('boxluartinggi');
            $table->text('effective');
            $table->text('preparedate');
            $table->text('suplier');
            $table->text('isi');
            $table->text('isiboxsap');
            $table->text('sapataubendel');
            $table->text('susunan');
            $table->text('gambar1');
            $table->text('gambar2');
            $table->text('gambar3');
            $table->text('gambar4');
            $table->text('gambar5');
            $table->text('notepackaging');
            $table->text('aplikasi');
            $table->text('layout');
            $table->text('up');
            $table->text('ukpresslayout');
            $table->text('mat1');
            $table->text('mat2');
            $table->text('mat3');
            $table->text('as1');
            $table->text('as2');
            $table->text('as3');
            $table->text('pisau');
            $table->text('citto');
            $table->text('emboss');
            $table->text('hotprint');
            $table->text('note1');
            $table->text('note2');
            $table->text('note3');
            $table->text('notedesignrequest');
            $table->text('tanggalterima');
            $table->text('filedesign');
            $table->text('filelayout');
            $table->text('statuslayout');
            $table->text('statusdocket');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('designnumbers');
    }
};
