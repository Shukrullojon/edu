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
        Schema::create('sms', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->string('phone');
            $table->tinyInteger('type')->comment('1->birthday, 2->add group, 3-> change group, 4 -> probniy dars, 5 -> qarzdorlig, 6->payment, 10 - reset password');
            $table->string('text');
            $table->tinyInteger('status')->comment('0 -> pending, 1-> sending');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sms');
    }
};
