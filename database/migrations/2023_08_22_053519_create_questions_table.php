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
        Schema::create('questions', function (Blueprint $table) {
            $table->id();
            $table->text('question_name')->nullable();
            $table->longText('title')->nullable();
            $table->text('reading_type')->nullable();
            $table->text('qcategory_id')->nullable();
            $table->text('qtype')->nullable();
            $table->longText('answer_reason')->nullable();
            $table->text('true_answer')->nullable();
            $table->text('mark')->nullable();
            $table->text('audio_file')->nullable();
            $table->text('photo')->nullable();
            $table->text('student_category')->nullable();
            $table->text('created_by')->nullable();
            $table->text('status')->nullable();
            $table->longText('remarks')->nullable();
            $table->text('admin_user_id')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('questions');
    }
};
