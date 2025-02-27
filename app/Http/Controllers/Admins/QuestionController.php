<?php

namespace App\Http\Controllers\Admins;

use Illuminate\Http\Request;
use App\Models\Admins\Question;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\Admins\QuestionAnswer;
use Intervention\Image\Facades\Image;
use App\Exports\QuestionReadingsExport;
use App\Models\Admins\QuestionCategory;
use Illuminate\Support\Facades\Validator;

class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     */

     function __construct()
     {
          $this->middleware('permission:question-reading-list|question-reading-create|question-reading-edit|question-reading-delete', ['only' => ['index','store']]);
          $this->middleware('permission:question-reading-create', ['only' => ['create','store']]);
          $this->middleware('permission:question-reading-edit', ['only' => ['edit','update']]);
          $this->middleware('permission:question-reading-delete', ['only' => ['destroy']]);
     }

    public function index(Request $request)
    {
        if($request->search){
            $search = $request->search;
            $questions = Question::with('questionCategory','adminUser')
                                ->where('question_name','LIKE',$search.'%')
                                ->latest('id')
                                ->paginate(10);

            $questionsCount = Question::with('questionCategory','adminUser')
                                ->where('question_name','LIKE',$search.'%')
                                ->latest('id')
                                ->get()
                                ->count();

        }else{
        $questions = Question::with('questionCategory','adminUser')
                            ->latest('id')->paginate(10);

        $questionsCount = Question::with('questionCategory','adminUser')
                            ->latest('id')->get()->count();
        }
        return view('admins.question_managements.questions.index',compact('questions','questionsCount'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $qcategories = QuestionCategory::get();
        return view('admins.question_managements.questions.create',compact('qcategories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Validator::make($request->all(), [
            'question_name' => 'required',
            "mark" => 'required',
            'true_answer' => 'required',
            // "audio_file" => 'mimes:mp3,m4a',
        ])->validate();


            $question = new Question;

            if($request->file("photo")) {
                $file=$request->file("photo");
                $filename = time().'_'.$file->getClientOriginalName();
                $path=public_path('photos/questions/reading_questions');
                $img = Image::make($file);
                $img->resize(300, 300, function ($const) {
                $const->aspectRatio();
                })->save($path.'/'.$filename);

                $question->photo = $filename;
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
            $question->reading_type = $request->reading_type;
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
            $question->student_category = $request->student_category;
            $question->admin_user_id = auth()->user()->id;
            $question->save();

            if($question)
            {
                if($request->true_answer)
                {
                    for($i=0;$i<count($request['answer']);$i++)
                    {
                        $qa = new QuestionAnswer;
                        $qa->question_id = $question->id;
                        $qa->answer = $request['answer'][$i];
                        $qa->status = $request->status;
                        $qa->save();
                    }
                }
                else{
                    $qa = new QuestionAnswer;
                    $qa->question_id = $question->id;
                    $qa->answer = $request->true_false;
                    $qa->status = $request->status;
                    $qa->save();
                }
            }

            return redirect()->route('admin.questions.index')
                ->with('success', 'Created.');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $question = Question::with('questionCategory','adminUser')
                                ->find($id);

        $q_answers = QuestionAnswer::where('question_id',$id)->get();

        return view('admins.question_managements.questions.detail',compact('question','q_answers'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $question = Question::with('questionCategory','adminUser')
                                ->find($id);

        $q_answers = QuestionAnswer::where('question_id',$id)->get();

        return view('admins.question_managements.questions.edit',compact('question','q_answers'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        Validator::make($request->all(), [
            'question_name' => 'required',
            "mark" => 'required',
            'true_answer' => 'required',
        ])->validate();


            $question = Question::find($id);

            if($question->photo != null && $request->photo){
                if(file_exists(public_path('photos/questions/reading_questions/'.$question->photo))){

                    unlink('photos/questions/reading_questions/'.$question->photo);

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
                $path=public_path('photos/questions/reading_questions');
                $img = Image::make($file);
                $img->resize(300, 300, function ($const) {
                $const->aspectRatio();
                })->save($path.'/'.$filename);

                $question->photo = $filename;
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
            $question->reading_type = $request->reading_type;
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
            $question->student_category = $request->student_category;
            $question->admin_user_id = auth()->user()->id;
            $question->save();

        if($question)
            {
                if(isset($request['answer']))
                {
                    if(count($request['answer']) > 0)
                    {
                        for($i=0;$i<count($request['answer']);$i++)
                        {

                            if(isset($request['q_answer_id'][$i]))
                            {
                                $additional['answer'] = $request['answer'][$i];
                                $update_additional = QuestionAnswer::where('id',$request['q_answer_id'][$i])
                                                    ->update($additional);

                            }
                        }
                    }
                }
            }
            return redirect()->route('admin.questions.index')
            ->with('success', 'Updated.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $question = Question::find($id);

        if($question->photo != null){
            if(file_exists(public_path('photos/questions/reading_questions/'.$question->photo))){

                unlink('photos/questions/reading_questions/'.$question->photo);

            }
        }

        if($question->audio_file != null){
            if(file_exists(public_path('audios/questions/'.$question->audio_file))){

                unlink('audios/questions/'.$question->audio_file);

            }
        }

        $question->delete();

        QuestionAnswer::where('question_id',$id)->delete();

        return back()->with('success','Deleted.');
    }

    public function export()
    {
        return Excel::download(new QuestionReadingsExport, 'reading_questions.xlsx');
    }
}
