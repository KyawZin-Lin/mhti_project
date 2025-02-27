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
        Schema::create('batches', function (Blueprint $table) {
            $table->id();
            $table->text('academic_year_id')->nullable();
            $table->text('academic_year_name')->nullable();
            $table->text('batch')->nullable();
            $table->text('student_qty')->nullable();
            $table->text('enrolled_student')->nullable();
            $table->text('room_id')->nullable();
            $table->text('time')->nullable();
            $table->text('duration')->nullable();
            $table->text('start_date')->nullable();
            $table->text('end_date')->nullable();
            $table->text('degree_id')->nullable(); // For Course
            $table->text('admin_user_id')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('batches');
    }
};
