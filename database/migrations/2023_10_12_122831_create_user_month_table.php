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
        Schema::create('user_month', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('month');
            $table->bigInteger('salary');
            $table->bigInteger('pay_salary')->nullable();
            $table->tinyInteger('status')->comment('0->no pay, 1 -> pay');
            $table->tinyInteger('type')->comment('1->salary, 2 -> kpi, 3 -> hourly, 4 -> add_student, 5->active_student');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_month');
    }
};
