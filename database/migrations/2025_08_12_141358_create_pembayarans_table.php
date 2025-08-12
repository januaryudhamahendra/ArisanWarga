<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('pembayarans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('peserta_id')->constrained('pesertas')->cascadeOnDelete();
            $table->foreignId('arisan_id')->constrained('arisans')->cascadeOnDelete();
            $table->decimal('amount', 12, 2)->default(0);
            $table->boolean('status_bayar')->default(false); // false = belum, true = lunas
            $table->timestamps();

            $table->unique(['peserta_id','arisan_id']); // satu peserta hanya sekali per arisan
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pembayarans');
    }
};
