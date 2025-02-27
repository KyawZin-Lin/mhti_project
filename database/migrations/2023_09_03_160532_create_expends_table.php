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
        Schema::create('expends', function (Blueprint $table) {
            $table->id();
            $table->text('date')->nullable();
            $table->text('title')->nullable();
            $table->longText('description')->nullable();
            $table->text('teacher_id')->nullable();
            $table->text('staff_id')->nullable();
            $table->text('payment_type_id')->nullable();
            $table->text('particular')->nullable();
            $table->text('voucher_no')->nullable();
            $table->text('name')->nullable();
            $table->text('amount')->nullable();
            $table->text('qty')->nullable();
            $table->text('price')->nullable();
            $table->longText('thing')->nullable();
            $table->text('sign')->nullable();
            $table->longText('remark')->nullable();
            $table->text('admin_user_id')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('expends');
    }
};
