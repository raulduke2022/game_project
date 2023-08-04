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
        Schema::create('orders', function (Blueprint $table) {
            $table->id()->from(10000);
            $table->string('payeer_operation_id')->nullable();
            $table->string('operation_ps')->nullable();
            $table->dateTime('operation_date')->nullable();
            $table->dateTime('operation_pay_date')->nullable();
            $table->bigInteger('amount')->nullable();
            $table->string('curr')->nullable();
            $table->string('desc')->nullable();
            $table->string('status')->nullable();
            $table->string('user_email')->nullable(); //получаем от vue
            $table->string('user_ip')->nullable();
            $table->string('user_agent')->nullable();
            $table->unsignedBigInteger('game_id');
            $table->foreign('game_id')->references('id')->on('games');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
