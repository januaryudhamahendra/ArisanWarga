<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('arisans', function (Blueprint $table) {
            $table->id();
            $table->date('tanggal');
            $table->decimal('iuran', 12, 2);
            $table->unsignedBigInteger('pemenang_id')->nullable();
            $table->foreign('pemenang_id')->references('id')->on('pesertas')->nullOnDelete();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('arisans');
    }
};
