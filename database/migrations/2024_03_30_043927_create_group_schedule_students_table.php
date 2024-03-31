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
        Schema::create('group_schedule_students', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('group_schedule_id');
            $table->unsignedBigInteger('student_id');
            $table->float('attend')->default(0);
            $table->float('homework')->default(0);
            $table->float('ball')->default(0);
            $table->float('like')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('group_schedule_students');
    }
};
