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
        Schema::create('user_payment', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('group_id');
            $table->bigInteger('amount');
            $table->bigInteger('pay_amount');
            $table->string('month');
            $table->tinyInteger('days')->nullable();
            $table->string('info')->nullable();
            $table->date('pay_date')->nullable();
            $table->tinyInteger('type')->nullable()->comment('1 -> Naqt, 2 -> Plastik Karta, 3 -> Perevod');
            $table->tinyInteger('status')->comment("0 -> no pay, 1 -> later, 2 -> payed");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_payment');
    }
};
