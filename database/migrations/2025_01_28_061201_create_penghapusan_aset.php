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
        Schema::create('Penghapusan_aset', function (Blueprint $table) {
            $table->integerIncrements("penghapusan_id")->primary();
            $table->string("Status_penghapusan");
            $table->integer("Jml_dihapus");
            $table->string("Upload_File");
            $table->string("Upload_Foto");
            $table->string("Aset_id");
            $table->string("created_by")->nullable();
            $table->timestamp('created_at')->nullable();
            $table->string("updated_by")->nullable();
            $table->timestamp('updated_at')->nullable();
            $table->string('deleted_by')->nullable();
            $table->timestamp('deleted_at')->nullable();
        });
        Schema::create('Jual_aset', function (Blueprint $table) {
            $table->integerIncrements("penjualan_id")->primary();
            $table->date("Tgl_jual");
            $table->integer("Harga_jual");
            $table->string("Deskripsi");
            $table->integer("penghapusain_id");
            $table->string("created_by")->nullable();
            $table->timestamp('created_at')->nullable();
            $table->string("updated_by")->nullable();
            $table->timestamp('updated_at')->nullable();
        });
        Schema::create('aset_dihanguskan', function (Blueprint $table) {
            $table->integerIncrements("dihanguskan_id")->primary();
            $table->date("Tgl_dihanguskan");
            $table->string("Deskripsi");
            $table->integer("penghapusan_id");
            $table->string("created_by")->nullable();
            $table->timestamp('created_at')->nullable();
            $table->string("updated_by")->nullable();
            $table->timestamp('updated_at')->nullable();
            $table->string('deleted_by')->nullable();
            $table->timestamp('deleted_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('Penghapusan_aset');
        Schema::dropIfExists("Jual_aset");
        Schema::dropIfExists("aset_dihanguskan");
    }
};
