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
        Schema::create('book_count', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('book_id');
            $table->float('count');
            $table->float('sale')->default(0);
            $table->float('price');
            $table->float('sell_price');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('book_count');
    }
};
