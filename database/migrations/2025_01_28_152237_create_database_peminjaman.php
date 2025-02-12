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
            $table->integerIncrements("Pinjam_id")->primary();
            $table->string("Aset_id");
            $table->integer("Jml_pinjam");
            $table->integer('Infaq');
            $table->integer('Belum_kembali');
            $table->string("created_by")->nullable();
            $table->timestamp('created_at')->nullable();
            $table->string("updated_by")->nullable();
            $table->timestamp('updated_at')->nullable();
        });
        Schema::create('Peminjaman', function (Blueprint $table) {
            $table->integerIncrements("Pinjam_id")->primary();
            $table->date("Tgl_pinjam");
            $table->date("Tgl_harus_kembali");
            $table->integer("Peminjam_id");
            $table->string("created_by")->nullable();
            $table->timestamp('created_at')->nullable();
            $table->string("updated_by")->nullable();
            $table->timestamp('updated_at')->nullable();
        });
        Schema::create('Peminjam', function (Blueprint $table) {
            $table->integerIncrements("Peminjam_id")->primary();
            $table->string("Nama_peminjam");
            $table->string("No_HP");
            $table->string("created_by")->nullable();
            $table->timestamp('created_at')->nullable();
            $table->string("updated_by")->nullable();
            $table->timestamp('updated_at')->nullable();
        });
        Schema::create('Detil_kembali', function (Blueprint $table) {
            $table->integerIncrements("Kembali_id")->primary();
            $table->string("Aset_id");
            $table->integer("Jml_kembali");
            $table->string("Status_kembali");
            $table->string("created_by")->nullable();
            $table->timestamp('created_at')->nullable();
            $table->string("updated_by")->nullable();
            $table->timestamp('updated_at')->nullable();
        });
        Schema::create('Pengembalian', function (Blueprint $table) {
            $table->integerIncrements("Kembali_id")->primary();
            $table->date("Tgl_kembali");
            $table->integer("Pinjam_id");
            $table->string('Penerima');
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
        Schema::dropIfExists('Detil_pinjam');
        Schema::dropIfExists('Peminjaman');
        Schema::dropIfExists('Peminjam');
        Schema::dropIfExists('Detil_kembali');
        Schema::dropIfExists('Pengembalian');
    }
};
