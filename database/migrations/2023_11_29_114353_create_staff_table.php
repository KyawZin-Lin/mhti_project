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
        Schema::create('staff', function (Blueprint $table) {
            $table->id();
            $table->text('name')->nullable();
            $table->text('position')->nullable();
            $table->text('nrc')->nullable();
            $table->text('phone')->nullable();
            $table->text('address')->nullable();
            $table->text('salary_date')->nullable();
            $table->text('salary')->nullable();
            $table->text('payment_type_id')->nullable();
            $table->text('start_date')->nullable();
            $table->text('end_date')->nullable();
            $table->text('status')->nullable();
            $table->text('standard_salary')->nullable();
            $table->text('admin_user_id')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('staff');
    }
};
