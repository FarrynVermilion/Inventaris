<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

use function Laravel\Prompts\table;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('Penyusutan', function (Blueprint $table) {
            $table->string("Penyusutan_id")->primary();
            $table->date("Tgl_penyusutan");
            $table->Integer("Residu");
            $table->Integer("Nilai_susut");
            $table->date("Tahun_skrg");
            $table->integer("Umur_ekonomis");
            $table->string("Aset_id");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('Penyusutan');
    }
};
