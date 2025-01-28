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
        Schema::create('Detil_pinjam', function (Blueprint $table) {
            $table->string("Aset_id");
            $table->string("Pinjam_id")->primary();
            $table->integer("Jml_pinjam");
        });
        Schema::create('Peminjaman', function (Blueprint $table) {
            $table->string("Pinjam_id")->primary();
            $table->date("Tgl_pinjam");
            $table->date("Tgl_harus_kembali");
            $table->string("Peminjam_id");
        });
        Schema::create('Peminjam', function (Blueprint $table) {
            $table->string("Peminjam_id")->primary();
            $table->string("Nama_peminjam");
            $table->string("No_HP");
        });
        Schema::create('Detil_kembali', function (Blueprint $table) {
            $table->string("Kembali_id")->primary();
            $table->string("Aset_id");
            $table->integer("Jml_kembali");
            $table->string("Status_kembali");
        });
        Schema::create('Pengembalian', function (Blueprint $table) {
            $table->string("Kembali_id")->primary();
            $table->date("Tgl_kembali");
            $table->string("Pinjam_id");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('database_peminjaman');
    }
};
