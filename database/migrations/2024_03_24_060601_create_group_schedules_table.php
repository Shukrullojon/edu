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
        Schema::create('group_schedules', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('group_id');
            $table->date("date");
            $table->time("start_date");
            $table->time("end_date");
            $table->unsignedBigInteger("plan_teacher_id");
            $table->unsignedBigInteger("teacher_id")->nullable();
            $table->unsignedBigInteger("direction_id")->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('group_schedules');
    }
};
