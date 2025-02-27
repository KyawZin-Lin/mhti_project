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
        Schema::create('incomes', function (Blueprint $table) {
            $table->id();
            $table->text('date')->nullable();
            $table->text('title')->nullable();
            $table->text('code')->nullable();
            $table->text('student_id')->nullable();
            $table->text('course_id')->nullable();
            $table->text('batch_id')->nullable();
            $table->text('income_source_id')->nullable();
            $table->text('particular')->nullable();
            $table->text('voucher_no')->nullable();
            $table->text('student_no')->nullable();
            $table->text('course_abbre')->nullable();
            $table->integer('course_no')->nullable();
            $table->text('group')->nullable();
            $table->text('amount')->nullable();
            $table->longText('remark')->nullable();
            $table->text('admin_user_id')->nullable();
            $table->text('payment_type')->nullable();
            $table->text('payment_installment')->nullable();
            $table->text('payment_complete')->nullable();
            $table->text('pay_money')->nullable();
            $table->text('left_money')->nullable();
            $table->text('payment_date')->nullable();
            // $table->text('title')->nullable();
            $table->text('paid_by')->nullable();
            $table->text('received_by')->nullable();
            $table->text('checked_by')->nullable();
            $table->text('status')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('incomes');
    }
};
