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
        Schema::create('Aset', function (Blueprint $table) {
            $table->string("Aset_id")->primary();
            $table->string("Nama_Aset");
            $table->string("Merek_Aset");
            $table->string("Tipe");
            $table->string("Model");
            $table->string("Seri");
            $table->bigInteger("Harga_beli");
            $table->date("Tgl_perolehan");
            $table->date("Tgl_akhir_garansi");
            $table->string("Spesifikasi");
            $table->string("Kondisi_awal");
            $table->integer("Jml_aset");
            $table->integer("Stok");
            $table->string("Status_aset");
            $table->string("COA");
            $table->integer("Kategori_id");
            $table->integer("Ruang_id");
            $table->string("created_by")->nullable();
            $table->timestamp('created_at')->nullable();
            $table->string("updated_by")->nullable();
            $table->timestamp('updated_at')->nullable();
        });
        Schema::create('Kategori', function (Blueprint $table) {
            $table->integerIncrements("Kategori_id")->primary();
            $table->string("Nama_kategori");
            $table->string("created_by")->nullable();
            $table->timestamp('created_at')->nullable();
            $table->string("updated_by")->nullable();
            $table->timestamp('updated_at')->nullable();
        });
        Schema::create('Ruang', function (Blueprint $table) {
            $table->integerIncrements("Ruang_id")->primary();
            $table->string("Nm_ruang");
            $table->string("Lokasi");
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
        Schema::dropIfExists('Aset');
        Schema::dropIfExists('Kategori');
        Schema::dropIfExists('Ruang');
    }
};
