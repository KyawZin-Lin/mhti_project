<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Models\Admins\State;
use Illuminate\Http\Request;
use App\Models\Admins\Income;
use App\Models\Admins\NrcInfo;
use App\Models\Admins\Student;
use App\Models\Admins\Township;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use App\Models\Admins\MedicalStatus;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Validator;
use App\Models\Admins\StudentMedicalStatus;
use Illuminate\Contracts\Auth\StatefulGuard;

class UserRegisterController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    protected $guard;

    public function __construct(StatefulGuard $guard) {
        $this->guard = $guard;
    }

    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $medical_statuses = MedicalStatus::get();
        $states = State::get();
        $townships = Township::get();
        $nrc_info_nos = NrcInfo::select('no')->distinct()->orderBy('no','DESC')->get();
        $nrc_infos = NrcInfo::orderBy('no','ASC')->get();
        return view('users.auth.register',compact('medical_statuses','states','townships','nrc_infos','nrc_info_nos'));
    }

    public function ajaxNrcAbbre(Request $request)
    {
        $nrc_no = $request->nrc_no;
        $nrc_infos = NrcInfo::where('no',$nrc_no)->orderBy('no','ASC')->get();

        // Log::info($nrc_no);

        return response()->json([
            'nrc_infos' => $nrc_infos,
        ]);
    }

    public function ajaxTownship(Request $request)
    {
        $state_id = $request->state_id;
        $townships = Township::where('state_id',$state_id)->get();

        // Log::info($nrc_no);

        return response()->json([
            'townships' => $townships,
        ]);
    }

    public function generate_numbers($start, $count, $digits) {

		for ($n = $start; $n < $start+$count; $n++) {

			$result = str_pad($n, $digits, "0", STR_PAD_LEFT);

		}
		return $result;
	}

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'password' => 'required|same:confirm_password',
        ])->validate();

            $student = new Student;
            if($request->file("photo")) {
                $file=$request->file("photo");
                $filename = time().'_'.$file->getClientOriginalName();
                $path=public_path('photos/students/photos');
                $img = Image::make($file);
                $img->resize(300, 300, function ($const) {
                $const->aspectRatio();
                })->save($path.'/'.$filename);

                $student->photo = $filename;
            }

            if($request->file("exam_photo")) {
                $file_exam=$request->file("exam_photo");
                $filename_exam = time().'_'.$file_exam->getClientOriginalName();
                $path=public_path('photos/students/exam_photos');
                $img = Image::make($file_exam);
                $img->resize(300, 300, function ($const) {
                $const->aspectRatio();
                })->save($path.'/'.$filename_exam);

                $student->exam_photo = $filename_exam;
            }

            if($request->file("passport_photo")) {
                $file_password=$request->file("passport_photo");
                $filename_password = time().'_'.$file_password->getClientOriginalName();
                $path=public_path('photos/students/passports');
                $img = Image::make($file_password);
                $img->resize(300, 300, function ($const) {
                $const->aspectRatio();
                })->save($path.'/'.$filename_password);

                $student->passport_photo = $filename_password;
            }

            if($request->file("nrc_front")) {
                $file_front=$request->file("nrc_front");
                $filename_front = time().'_'.$file_front->getClientOriginalName();
                $path=public_path('photos/students/nrc_fronts');
                $img = Image::make($file_front);
                $img->resize(300, 300, function ($const) {
                $const->aspectRatio();
                })->save($path.'/'.$filename_front);

                $student->nrc_front = $filename_front;
            }

            if($request->file("nrc_back")) {
                $file_back=$request->file("nrc_back");
                $filename_back = time().'_'.$file_back->getClientOriginalName();
                $path=public_path('photos/students/nrc_backs');
                $img = Image::make($file_back);
                $img->resize(300, 300, function ($const) {
                $const->aspectRatio();
                })->save($path.'/'.$filename_back);

                $student->nrc_back = $filename_back;
            }


            $student->name = $request->name;
            $student->student_category = $request->student_category;
            $student->email = $request->email;
            $student->phone = $request->phone;
            $student->mobile = $request->mobile;
            $student->nrc = $request->nrc;
            $student->nrc_info_id = $request->nrc_info_id;
            $student->gender = $request->gender;
            $student->dob = $request->dob;
            $student->address = $request->address;
            $student->state_id = $request->state_id;
            $student->township_id = $request->township_id;
            $student->academic_year_id = $request->academic_year_id;
            $student->father_name = $request->father_name;
            $student->mother_name = $request->mother_name;
            $student->approve_status = 0;
            $student->remarks = $request->remarks;
            $student->exam_id = $request->exam_id;
            $student->save();

            $student->student_id =  date("Y").date("m"). "-" .$this->generate_numbers((int)$student->id,1,7);

            $student->update();

            if($student){
                if($request['medical_status'])
                {
                    for($i=0;$i<count($request['medical_status']);$i++)
                    {
                        $medical_status = new StudentMedicalStatus;
                        $medical_status->student_id = $student->id;
                        $medical_status->medical_status = $request['medical_status'][$i];
                        $medical_status->save();
                    }
                }

                $user = new User;
                $user->name = $request->name;
                $user->student_id = $student->id;
                $user->email = $request->email;
                $user->student_id = $student->id;
                $user->status = 1;
                $user->password = Hash::make($request->password);
                $user->save();
            }

            auth()->login($user);

            return redirect()->route('user.announcements');
    }

    // public function store(Request $request)
    // {
    //     Validator::make($request->all(), [
    //         'name' => 'required',
    //         'email' => 'required|unique:users,email',
    //         'phone' => 'required',
    //         'password' => 'required|same:confirm_password',
    //     ])->validate();

    //         $student = new Student;
    //         if($request->file("photo")) {
    //             $file=$request->file("photo");
    //             $filename = time().'_'.$file->getClientOriginalName();
    //             $path=public_path('photos/students/photos');
    //             $img = Image::make($file);
    //             $img->resize(300, 300, function ($const) {
    //             $const->aspectRatio();
    //             })->save($path.'/'.$filename);

    //             $student->photo = $filename;
    //         }


    //         if($request->file("applicant_sign")) {
    //             $file=$request->file("applicant_sign");
    //             $filename = time().'_'.$file->getClientOriginalName();
    //             $path=public_path('photos/students/applicant_signs');
    //             $img = Image::make($file);
    //             $img->resize(300, 300, function ($const) {
    //             $const->aspectRatio();
    //             })->save($path.'/'.$filename);

    //             $student->applicant_sign = $filename;
    //         }

    //         if($request->file("registered_sign")) {
    //             $file_registered_sign=$request->file("registered_sign");
    //             $filename_registered_sign = time().'_'.$file_registered_sign->getClientOriginalName();
    //             $path=public_path('photos/students/registered_signs');
    //             $img = Image::make($file_registered_sign);
    //             $img->resize(300, 300, function ($const) {
    //             $const->aspectRatio();
    //             })->save($path.'/'.$filename_registered_sign);

    //             $student->registered_sign = $filename_registered_sign;
    //         }

    //         $student->student_id = $request->student_id;
    //         $student->date = $request->date;
    //         $student->name = $request->name;
    //         $student->student_category = $request->student_category;
    //         $student->degree_id = $request->degree_id;
    //         $student->classroom_id = $request->classroom_id;
    //         $student->email = $request->email;
    //         $student->phone = $request->phone;
    //         $student->mobile = $request->mobile;
    //         $student->nrc = $request->nrc;
    //         $student->nrc_info_id = $request->nrc_info_id;
    //         $student->gender = $request->gender;
    //         $student->age = $request->age;
    //         $student->dob = $request->dob;
    //         $student->address = $request->address;
    //         $student->state_id = $request->state_id;
    //         $student->township_id = $request->township_id;
    //         $student->academic_year_id = $request->academic_year_id;
    //         $student->father_name = $request->father_name;
    //         $student->mother_name = $request->mother_name;
    //         $student->approve_by = auth()->user()->id;
    //         $student->approve_status = 1;
    //         $student->remarks = $request->remarks;
    //         $student->exp = $request->exp;
    //         $student->topik_level = $request->topik_level;
    //         $student->exam_id = $request->exam_id;
    //         $student->admin_user_id = auth()->user()->id;

    //         $student->course_registered = $request->course_registered;
    //         $student->vr_no = $request->vr_no;
    //         $student->national_id = $request->national_id;
    //         $student->nationality = $request->nationality;
    //         $student->religion = $request->religion;
    //         $student->marital_status = $request->marital_status;
    //         $student->education = $request->education;
    //         $student->qualification = $request->qualification;
    //         $student->english_language = $request->english_language;
    //         $student->other_language = $request->other_language;
    //         $student->student_status = $request->student_status;
    //         $student->business_type = $request->business_type;
    //         $student->position = $request->position;
    //         $student->duties = $request->duties;
    //         $student->pay = $request->pay;
    //         $student->leaving = $request->leaving;
    //         $student->future_interest = implode(',',$request->future_interest);
    //         $student->applicant = $request->applicant;
    //         $student->registered = $request->registered;
    //         $student->save();

    //         if($student){

    //             $income = new Income;
    //             $income->date = $request->payment_date;
    //             $income->title = $request->title;
    //             $income->payment_type = $request->payment_type;
    //             $income->student_id = $student->id;
    //             $income->income_source_id = $request->income_source_id;
    //             $income->particular = $request->particular;
    //             $income->group = $request->group;
    //             $income->amount = $request->pay_money;
    //             $income->left_money = $request->left_money;
    //             $income->remark = $request->remark;
    //             $income->admin_user_id = auth()->user()->id;
    //             $income->save();

    //             $user = new User;
    //             $user->name = $request->name;
    //             $user->email = $request->email;
    //             $user->student_id = $student->id;
    //             $user->status = 1;
    //             $user->password = Hash::make($request->password);
    //             $user->save();

    //         }

    //         auth()->login($user);

    //         return redirect()->route('user.announcements');

    // }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
