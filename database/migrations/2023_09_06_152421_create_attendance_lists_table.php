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
        Schema::create('attendance_lists', function (Blueprint $table) {
            $table->id();
            $table->text('date')->nullable();
            $table->text('classroom_id')->nullable();
            $table->text('student_id')->nullable();
            $table->text('academic_year_id')->nullable();
            $table->text('admin_user_id')->nullable();
            $table->longText('remark')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('attendance_lists');
    }
};
