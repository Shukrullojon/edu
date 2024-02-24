<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('tasks', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('comment')->nullable();
            $table->time('time');
            $table->tinyInteger('day');
            $table->tinyInteger('type')->comment('1 -> every day, 2 -> one time');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('attach_user_id');
            $table->tinyInteger('status')->comment('1 -> active, 0 -> arxive');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tasks');
    }
};
