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
        Schema::create('kerjaans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_user')
                ->constrained('penggunas')
                ->onDelete('cascade');
            $table->foreignId('id_kategori')
                ->constrained('kategoris')
                ->onDelete('cascade');
            $table->string('nama');
            $table->decimal('imbalan', 12, 2);
            $table->string('lokasi');
            $table->date('deadline');
            $table->enum('status', ['dibuka', 'berjalan', 'selesai']);

    $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kerjaan');
    }
};
