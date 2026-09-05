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
        Schema::create('ulasans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_pekerjaan')
                ->constrained('kerjaans')
                ->onDelete('cascade');
            $table->foreignId('id_pelamar')
                ->constrained('penggunas')
                ->onDelete('cascade');
            $table->tinyInteger('rating');
            $table->text('komentar');
            $table->unique('id_pekerjaan');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ulasan');
    }
};
