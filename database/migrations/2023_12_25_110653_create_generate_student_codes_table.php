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
        Schema::create('generate_student_codes', function (Blueprint $table) {
            $table->id();
            $table->text('course_id')->nullable();
            $table->text('student_no')->nullable();
            $table->text('course_no')->nullable();
            $table->text('course_abbre')->nullable();
            $table->text('status')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('generate_student_codes');
    }
};
