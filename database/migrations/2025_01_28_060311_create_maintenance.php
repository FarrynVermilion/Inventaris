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
        Schema::create('Maintenance', function (Blueprint $table) {
            $table->integerIncrements("maintenance_id")->primary();
            $table->date("Tgl_maintenance");
            $table->string("Jenis_maintenance");
            $table->string("Deskripsi");
            $table->integer("Biaya");
            $table->string("Nm_teknisi");
            $table->string("Aset_id");
            $table->integer("Jumlah");
            $table->string("created_by")->nullable();
            $table->timestamp('created_at')->nullable();
            $table->string("updated_by")->nullable();
            $table->timestamp('updated_at')->nullable();
        });
        Schema::create('Penggunaan', function (Blueprint $table) {
            $table->integerIncrements("Penggunaan_id")->primary();
            $table->string("Aset_id");
            $table->string("Untuk");
            $table->integer("Jumlah");
            $table->string("created_by")->nullable();
            $table->timestamp('created_at')->nullable();
            $table->string("updated_by")->nullable();
            $table->timestamp('updated_at')->nullable();
        });
        Schema::create('Rusak', function (Blueprint $table) {
            $table->integerIncrements("Rusak_id")->primary();
            $table->string("Aset_id");
            $table->string("Kerusakan");
            $table->string("Penanggung_jawab");
            $table->integer("Jumlah");
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
        Schema::dropIfExists('Maintenance');
        Schema::dropIfExists('Penggunaan');
        Schema::dropIfExists('Rusak');
    }
};
