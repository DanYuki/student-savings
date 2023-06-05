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
        Schema::create('transactions', function (Blueprint $table) {
            $table->id('transaction_id');
            $table->foreignId('student_id');
            $table->timestamps();
            $table->enum('transaction_type', ['Deposit', 'Withdraw']);
            $table->integer('transaction_amount', false, true);
            $table->date('transaction_date');
            $table->string('transaction_reason')->default('Tidak ada');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transactions');
    }
};
