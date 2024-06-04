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
            $table->unsignedBigInteger('teacher_id')->default(0)->comment("Darsni qaysi o'qituvchi o'tgani.");
            $table->date("date");
            $table->time("begin_time");
            $table->time("end_time");
            $table->unsignedBigInteger('room_id');
            $table->unsignedBigInteger('direction_id');
            $table->unsignedBigInteger('day_id');
            $table->unsignedBigInteger('student_id');
            $table->float('attend')->default(0);
            $table->float('homework')->default(0);
            $table->float('ball')->default(0);
            $table->string('comment')->nullable();
            $table->tinyInteger('status')->default(0);
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
