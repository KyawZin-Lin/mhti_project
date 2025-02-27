<?php

namespace App\Http\Controllers\Admins;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;
use Intervention\Image\Facades\Image;
use App\Models\Admins\QuestionCategory;
use App\Models\Admins\QuestionListening;
use App\Exports\ExportQuestionListenings;
use Illuminate\Support\Facades\Validator;

class QuestionListeningController extends Controller
{
    /**
     * Display a listing of the resource.
     */

     function __construct()
     {
          $this->middleware('permission:question-listening-list|question-listening-create|question-listening-edit|question-listening-delete', ['only' => ['index','store']]);
          $this->middleware('permission:question-listening-create', ['only' => ['create','store']]);
          $this->middleware('permission:question-listening-edit', ['only' => ['edit','update']]);
          $this->middleware('permission:question-listening-delete', ['only' => ['destroy']]);
     }


    public function index(Request $request)
    {
        if($request->search){
            $search = $request->search;
            $question_listenings = QuestionListening::with('questionCategory','adminUser')
                                ->where('title','LIKE',$search.'%')
                                ->latest('id')
                                ->paginate(10);

            $question_listeningsCount = QuestionListening::with('questionCategory','adminUser')
                                ->where('title','LIKE',$search.'%')
                                ->latest('id')
                                ->get()
                                ->count();

        }else{
            $question_listenings = QuestionListening::with('questionCategory','adminUser')
                                ->latest('id')->paginate(10);

            $question_listeningsCount = QuestionListening::with('questionCategory','adminUser')
                                ->latest('id')->get()->count();
        }
        return view('admins.question_managements.question_listenings.index',compact('question_listenings','question_listeningsCount'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $qcategories = QuestionCategory::get();
        return view('admins.question_managements.question_listenings.create',compact('qcategories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Validator::make($request->all(), [
            // 'title' => 'required',
            "mark" => 'required',
            'true_answer' => 'required',
            // "audio_file" => 'mimes:mp3,m4a',
        ])->validate();


            $question = new QuestionListening;

            if($request->file("photo")) {
                $file=$request->file("photo");
                $filename = time().'_'.$file->getClientOriginalName();
                $path=public_path('photos/questions/listening_questions');
                $img = Image::make($file);
                $img->resize(300, 300, function ($const) {
                $const->aspectRatio();
                })->save($path.'/'.$filename);

                $question->q_photo = $filename;
            }

            if($request->file("answer_photo1")) {
                $file1=$request->file("answer_photo1");
                $filename1 = time().'_'.$file1->getClientOriginalName();
                $path=public_path('photos/questions/listening_one');
                $img = Image::make($file1);
                $img->resize(300, 300, function ($const) {
                $const->aspectRatio();
                })->save($path.'/'.$filename1);

                $question->answer_photo1 = $filename1;
            }

            if($request->file("answer_photo2")) {
                $file2=$request->file("answer_photo2");
                $filename2 = time().'_'.$file2->getClientOriginalName();
                $path=public_path('photos/questions/listening_two');
                $img = Image::make($file2);
                $img->resize(300, 300, function ($const) {
                $const->aspectRatio();
                })->save($path.'/'.$filename2);

                $question->answer_photo2 = $filename2;
            }

            if($request->file("answer_photo3")) {
                $file3=$request->file("answer_photo3");
                $filename3 = time().'_'.$file3->getClientOriginalName();
                $path=public_path('photos/questions/listening_three');
                $img = Image::make($file3);
                $img->resize(300, 300, function ($const) {
                $const->aspectRatio();
                })->save($path.'/'.$filename3);

                $question->answer_photo3 = $filename3;
            }

            if($request->file("answer_photo4")) {
                $file4=$request->file("answer_photo4");
                $filename4 = time().'_'.$file4->getClientOriginalName();
                $path=public_path('photos/questions/listening_four');
                $img = Image::make($file4);
                $img->resize(300, 300, function ($const) {
                $const->aspectRatio();
                })->save($path.'/'.$filename4);

                $question->answer_photo4 = $filename4;
            }

            if($request->hasFile('audio_file'))
        {
            $audio_file = $request->file("audio_file");
            $audio_file_name = time().'_'.$audio_file->getClientOriginalName();
            $audio_file->move(public_path().'/audios/questions',$audio_file_name);

            $question->audio_file = $audio_file_name;
        }

            $question->question_name = $request->question_name;
            $question->title = $request->title;
            $question->listening_type = $request->listening_type;
            $question->qcategory_id = $request->qcategory_id;
            $question->qtype = $request->qtype;
            $question->answer_reason = $request->answer_reason;
            if($request->true_answer)
            {
                $question->true_answer = $request->true_answer;
            }
            else
            {
                $question->true_answer = $request->true_false;
            }
            $question->mark = $request->mark;
            $question->created_by = auth()->user()->id;
            $question->status = $request->status;
            $question->remarks = $request->remarks;
            $question->answer1 = $request->answer1;
            $question->answer2 = $request->answer2;
            $question->answer3 = $request->answer3;
            $question->answer4 = $request->answer4;
            $question->student_category = $request->student_category;
            $question->admin_user_id = auth()->user()->id;
            $question->save();

            return redirect()->route('admin.question_listenings.index')
                ->with('success', 'Created.');
    }

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
        $question = QuestionListening::find($id);
        $qcategories = QuestionCategory::get();
        return view('admins.question_managements.question_listenings.edit',compact('question','qcategories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        Validator::make($request->all(), [
            // 'title' => 'required',
            "mark" => 'required',
            'true_answer' => 'required',
            // "audio_file" => 'mimes:mp3,m4a',
        ])->validate();


            $question = QuestionListening::find($id);

            if($question->answer_photo1 != null && $request->answer_photo1){
                if(file_exists(public_path('photos/questions/listening_one/'.$question->answer_photo1))){

                    unlink('photos/questions/listening_one/'.$question->answer_photo1);

                }
            }

            if($question->answer_photo2 != null && $request->answer_photo2){
                if(file_exists(public_path('photos/questions/listening_two/'.$question->answer_photo2))){

                    unlink('photos/questions/listening_two/'.$question->answer_photo2);

                }
            }

            if($question->answer_photo3 != null && $request->answer_photo3){
                if(file_exists(public_path('photos/questions/listening_three/'.$question->answer_photo3))){

                    unlink('photos/questions/listening_three/'.$question->answer_photo3);

                }
            }

            if($question->answer_photo4 != null && $request->answer_photo4){
                if(file_exists(public_path('photos/questions/listening_four/'.$question->answer_photo4))){

                    unlink('photos/questions/listening_four/'.$question->answer_photo4);

                }
            }

            if($question->q_photo != null && $request->q_photo){
                if(file_exists(public_path('photos/questions/listening_questions/'.$question->q_photo))){

                    unlink('photos/questions/listening_questions/'.$question->q_photo);

                }
            }

            if($question->audio_file != null && $request->audio_file){
                if(file_exists(public_path('audios/questions/'.$question->audio_file))){

                    unlink('audios/questions/'.$question->audio_file);

                }
            }

            if($request->file("photo")) {
                $file=$request->file("photo");
                $filename = time().'_'.$file->getClientOriginalName();
                $path=public_path('photos/questions/listening_questions');
                $img = Image::make($file);
                $img->resize(300, 300, function ($const) {
                $const->aspectRatio();
                })->save($path.'/'.$filename);

                $question->q_photo = $filename;
            }

            if($request->file("answer_photo1")) {
                $file1=$request->file("answer_photo1");
                $filename1 = time().'_'.$file1->getClientOriginalName();
                $path=public_path('photos/questions/listening_one');
                $img = Image::make($file1);
                $img->resize(300, 300, function ($const) {
                $const->aspectRatio();
                })->save($path.'/'.$filename1);

                $question->answer_photo1 = $filename1;
            }

            if($request->file("answer_photo2")) {
                $file2=$request->file("answer_photo2");
                $filename2 = time().'_'.$file2->getClientOriginalName();
                $path=public_path('photos/questions/listening_two');
                $img = Image::make($file2);
                $img->resize(300, 300, function ($const) {
                $const->aspectRatio();
                })->save($path.'/'.$filename2);

                $question->answer_photo2 = $filename2;
            }

            if($request->file("answer_photo3")) {
                $file3=$request->file("answer_photo3");
                $filename3 = time().'_'.$file3->getClientOriginalName();
                $path=public_path('photos/questions/listening_three');
                $img = Image::make($file3);
                $img->resize(300, 300, function ($const) {
                $const->aspectRatio();
                })->save($path.'/'.$filename3);

                $question->answer_photo3 = $filename3;
            }

            if($request->file("answer_photo4")) {
                $file4=$request->file("answer_photo4");
                $filename4 = time().'_'.$file4->getClientOriginalName();
                $path=public_path('photos/questions/listening_four');
                $img = Image::make($file4);
                $img->resize(300, 300, function ($const) {
                $const->aspectRatio();
                })->save($path.'/'.$filename4);

                $question->answer_photo4 = $filename4;
            }

            if($request->hasFile('audio_file'))
        {
            $audio_file = $request->file("audio_file");
            $audio_file_name = time().'_'.$audio_file->getClientOriginalName();
            $audio_file->move(public_path().'/audios/questions',$audio_file_name);

            $question->audio_file = $audio_file_name;
        }

            $question->question_name = $request->question_name;
            $question->title = $request->title;
            $question->listening_type = $request->listening_type;
            $question->qcategory_id = $request->qcategory_id;
            $question->qtype = $request->qtype;
            $question->answer_reason = $request->answer_reason;
            if($request->true_answer)
            {
                $question->true_answer = $request->true_answer;
            }
            else
            {
                $question->true_answer = $request->true_false;
            }
            $question->mark = $request->mark;
            $question->created_by = auth()->user()->id;
            $question->status = $request->status;
            $question->remarks = $request->remarks;
            $question->answer1 = $request->answer1;
            $question->answer2 = $request->answer2;
            $question->answer3 = $request->answer3;
            $question->answer4 = $request->answer4;
            $question->student_category = $request->student_category;
            $question->admin_user_id = auth()->user()->id;
            $question->save();

            return redirect()->route('admin.question_listenings.index')
                ->with('success', 'Updated.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $question = QuestionListening::find($id);

        if($question->answer_photo1 != null){
            if(file_exists(public_path('photos/questions/listening_one/'.$question->answer_photo1))){

                unlink('photos/questions/listening_one/'.$question->answer_photo1);

            }
        }

        if($question->answer_photo2 != null){
            if(file_exists(public_path('photos/questions/listening_two/'.$question->answer_photo2))){

                unlink('photos/questions/listening_two/'.$question->answer_photo2);

            }
        }

        if($question->answer_photo3 != null){
            if(file_exists(public_path('photos/questions/listening_three/'.$question->answer_photo3))){

                unlink('photos/questions/listening_three/'.$question->answer_photo3);

            }
        }

        if($question->answer_photo4 != null){
            if(file_exists(public_path('photos/questions/listening_four/'.$question->answer_photo4))){

                unlink('photos/questions/listening_four/'.$question->answer_photo4);

            }
        }

        if($question->q_photo != null){
            if(file_exists(public_path('photos/questions/listening_questions/'.$question->q_photo))){

                unlink('photos/questions/listening_questions/'.$question->q_photo);

            }
        }

        if($question->audio_file != null){
            if(file_exists(public_path('audios/questions/'.$question->audio_file))){

                unlink('audios/questions/'.$question->audio_file);

            }
        }

        $question->delete();
        return back()->with('success','Deleted.');
    }

    public function export()
    {
        return Excel::download(new ExportQuestionListenings, 'listening_questions.xlsx');
    }
}
