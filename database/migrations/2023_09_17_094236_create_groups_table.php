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
        Schema::create('groups', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->date('start_date')->nullable();
            $table->time('start_hour')->nullable();
            $table->unsignedBigInteger('cource_id');
            $table->unsignedBigInteger('filial_id');
            $table->tinyInteger('max_student')->nullable();
            $table->tinyInteger('max_teacher')->nullable();
            $table->tinyInteger('status')->comment('1 -> new group, 2 -> open group, 3 -> close group');
            $table->string('color')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('groups');
    }
};
