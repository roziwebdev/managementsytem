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
        Schema::create('packagings', function (Blueprint $table) {
            $table->id();
            $table->string('pn');
            $table->string('designno');
            $table->string('product');
            $table->string('sap');
            $table->string('nwpcs');
            $table->string('estimasipackaging');
            $table->string('isibox');
            $table->string('boxkg');
            $table->string('boxcode');
            $table->string('boxname');
            $table->string('boxspecs');
            $table->string('boxsize');
            $table->string('boxdalampanjang');
            $table->string('boxdalamlebar');
            $table->string('boxdalamtinggi');
            $table->string('boxluarpanjang');
            $table->string('boxluarlebar');
            $table->string('boxluartinggi');
            $table->string('effective');
            $table->string('status');
            $table->string('preparedate');
            $table->string('suplier');
            $table->string('isi');
            $table->string('isiboxsap');
            $table->string('sapataubendel');
            $table->string('susunan');
            $table->string('created');
            $table->string('gambar1');
            $table->string('gambar2');
            $table->string('gambar3');
            $table->string('gambar4');
            $table->string('gambar5');
            $table->string('notepackaging');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('packagings');
    }
};
