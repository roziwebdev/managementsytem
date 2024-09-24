<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        Schema::create('materialrequests', function (Blueprint $table) {
            $table->id();
            $table->string('idpo')->nullable();
            $table->longText('mrdate')->nullable();
            $table->string('dept')->nullable();
            $table->string('sisastock')->nullable();
            $table->string('etauser')->nullable();
            $table->string('lastorder')->nullable();
            $table->string('lastpo')->nullable();
            $table->string('lastprice')->nullable();
            $table->string('alamat')->nullable();
            $table->string('job')->nullable();
            $table->string('item')->nullable();
            $table->string('specs')->nullable();
            $table->string('size')->nullable();
            $table->string('panjang')->nullable();
            $table->string('lebar')->nullable();
            $table->string('tinggi')->nullable();
            $table->string('qty')->nullable();
            $table->string('arahseratp')->nullable();
            $table->string('arahseratl')->nullable();
            $table->string('type')->nullable();
            $table->string('status')->nullable();
            $table->string('created')->nullable();
            $table->string('kosong1')->nullable();
            $table->string('kosong2')->nullable();
            $table->string('kosong3')->nullable();
            $table->string('box1')->nullable();
            $table->string('box2')->nullable();
            $table->string('box3')->nullable();
            $table->string('requestedit')->nullable();
            $table->string('approvalkadept_at')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('materialrequests');
    }
};
