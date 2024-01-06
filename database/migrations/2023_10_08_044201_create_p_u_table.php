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
        Schema::create('p_u', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('p_c_id');
            $table->unsignedBigInteger('attach_user_id');
            $table->tinyInteger('spend_time')->nullable();
            $table->timestamp('start_time')->nullable();
            $table->tinyInteger('status')->comment('0 -> give, 1-> working, 2 -> finishing');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('p_u');
    }
};
