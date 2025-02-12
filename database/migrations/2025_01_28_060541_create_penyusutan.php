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
            $table->increments("Penyusutan_id")->primary();
            $table->date("Tgl_penyusutan");
            $table->Integer("Residu");
            $table->Integer("Nilai_susut");
            $table->date("Tahun_skrg");
            $table->integer("Umur_ekonomis");
            $table->string("Aset_id");
            $table->string("created_by")->nullable();
            $table->timestamp('created_at')->nullable();
            $table->string("updated_by")->nullable();
            $table->timestamp('updated_at')->nullable();
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
