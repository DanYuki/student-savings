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
        Schema::create('students', function (Blueprint $table) {
            $table->id('student_id');
            $table->timestamps();
            $table->string('student_name');
            $table->integer('student_class', false, true);
            $table->string('student_nisn');
            $table->date('date_of_birth');
            $table->enum('student_gender', ['L', 'P']);
            $table->integer('saving_balance', false, true);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};
