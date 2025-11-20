<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('kamars', function (Blueprint $table) {
            $table->id();
            $table->string('nomor_kamar');
            $table->string('tipe_kamar');
            $table->enum('status', ['Terisi', 'Kosong', 'Perbaikan']);
            $table->integer('harga_sewa');
            $table->text('deskripsi')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::table('kamars', function (Blueprint $table) {
        $table->dropColumn('nomor_kamar');
    });
    }
};
