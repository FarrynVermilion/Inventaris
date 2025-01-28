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
            $table->string("maintenance_id")->primary();
            $table->date("Tgl_maintenance");
            $table->string("Jenis_maintenance");
            $table->string("Deskripsi");
            $table->integer("Biaya");
            $table->string("Nm_teknisi");
            $table->string("Aset_id");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('Maintenance');
    }
};
