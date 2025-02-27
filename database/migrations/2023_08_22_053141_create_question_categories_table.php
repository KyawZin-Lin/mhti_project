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
        Schema::create('question_categories', function (Blueprint $table) {
            $table->id();
            $table->text('name')->nullable();
            $table->text('academic_year_id')->nullable();
            $table->text('course_id')->nullable();
            $table->text('module_id')->nullable();
            $table->text('created_by')->nullable();
            $table->text('status')->nullable();
            $table->text('remarks')->nullable();
            $table->text('admin_user_id')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('question_categories');
    }
};
