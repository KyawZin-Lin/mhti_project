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
            $table->id();
            $table->text('date')->nullable();
            $table->text('start_date')->nullable();
            $table->text('end_date')->nullable();
            $table->text('student_id')->nullable();
            $table->text('course_registered')->nullable();
            $table->text('name')->nullable();
            $table->text('vr_no')->nullable();
            $table->text('student_no')->nullable();
            $table->text('additional_course_id')->nullable();
            $table->text('additional_student_no')->nullable();
            $table->text('course_no')->nullable();
            $table->text('course_abbre')->nullable();
            $table->text('national_id')->nullable();
            $table->text('student_category')->nullable();
            $table->text('degree_id')->nullable();
            $table->text('classroom_id')->nullable();
            $table->text('batch_id')->nullable();
            $table->text('email')->nullable();
            $table->text('phone')->nullable();
            $table->text('mobile')->nullable();
            $table->text('exam_id')->nullable();
            $table->text('exam_photo')->nullable();
            $table->text('passport_photo')->nullable();
            $table->text('nrc_front')->nullable();
            $table->text('nrc_back')->nullable();
            $table->text('nrc')->nullable();
            $table->text('nrc_info_id')->nullable();
            $table->text('gender')->nullable();
            $table->text('age')->nullable();
            $table->text('nationality')->nullable();
            $table->text('religion')->nullable();
            $table->text('marital_status')->nullable();
            $table->text('dob')->nullable();
            $table->text('course_id')->nullable();
            $table->longText('address')->nullable();
            $table->text('township_id')->nullable();
            $table->text('state_id')->nullable();
            $table->text('photo')->nullable();
            $table->text('academic_year_id')->nullable();
            $table->text('father_name')->nullable();
            $table->text('mother_name')->nullable();
            $table->text('approve_by')->nullable();
            $table->text('approve_status')->default(0)->comment("1 = Approve and 0 = Not approved");
            $table->text('status')->nullable();
            $table->text('exp')->nullable();
            $table->text('topik_level')->nullable();
            $table->longText('remarks')->nullable();
            $table->text('admin_user_id')->nullable();
            $table->text('education')->nullable();
            $table->text('qualification')->nullable();
            $table->text('english_language')->nullable();
            $table->text('other_language')->nullable();
            $table->text('student_status')->nullable();
            $table->text('business_type')->nullable();
            $table->text('position')->nullable();
            $table->text('duties')->nullable();
            $table->text('pay')->nullable();
            $table->text('payment_complete')->nullable();
            $table->text('leaving')->nullable();
            $table->text('future_interest')->nullable();
            $table->text('source_survey')->nullable();
            $table->text('oversea')->nullable();
            $table->text('remark')->nullable();
            $table->text('applicant')->nullable();
            $table->text('applicant_sign')->nullable();
            $table->text('registered')->nullable();
            $table->text('registered_sign')->nullable();
            $table->text('open_day')->nullable();
            $table->text('close_day')->nullable();
            $table->text('location')->nullable();
            $table->timestamps();
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
