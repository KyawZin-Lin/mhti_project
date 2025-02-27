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
        Schema::create('teachers', function (Blueprint $table) {
            $table->id();
            $table->text('ref_no')->nullable();
            $table->text('name')->nullable();
            $table->text('email')->nullable();
            $table->text('phone')->nullable();
            $table->text('nrc')->nullable();
            $table->text('nrc_info_id')->nullable();
            $table->text('gender')->nullable();
            $table->text('position')->nullable();
            $table->text('dob')->nullable();
            $table->text('degree_id')->nullable();
            $table->text('job_id')->nullable();
            $table->text('course_id')->nullable();
            $table->text('batch_id')->nullable();
            $table->text('degree')->nullable();
            $table->text('academic_year_id')->nullable();
            $table->longText('address')->nullable();
            $table->text('township_id')->nullable();
            $table->text('state_id')->nullable();
            $table->text('photo')->nullable();
            $table->text('approve_by')->nullable();
            $table->text('approve_status')->default(0)->comment("1 = Approve and 0 = Not approved");
            $table->text('status')->nullable();
            $table->text('duty_assign')->nullable();
            $table->longText('remarks')->nullable();
            $table->longText('topik_level')->nullable();
            $table->longText('standard_salary')->nullable();
            $table->text('admin_user_id')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('teachers');
    }
};
