<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('Nama_Pemesan');
            $table->string('nomor_telfon');
            $table->timestamp('tanggal_order')->useCurrent();
            $table->enum('pilih_paket', ['paket 5kg', 'paket 10kg', 'paket 15kg'])->default('paket 5kg');
            $table->bigInteger('jumlah_pair_pasang')->nullable();
            $table->enum('expedisi', ['JNE', 'TIKI', 'Pos Indonesia'])->default('JNE');
            $table->string('alamat');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
