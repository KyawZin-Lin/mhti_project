<?php

namespace App\Http\Controllers\Users;

use Illuminate\Http\Request;
use App\Models\Admins\Question;
use App\Models\Users\StudentAnswer;
use App\Http\Controllers\Controller;
use App\Models\Admins\QuestionAnswer;

class QuestionController extends Controller
{
    public function examReadingType1()
    {
        $qid = [];
        $student_answers = StudentAnswer::where('user_id',auth()->user()->id)->get();
        foreach($student_answers as $sa){
            $qid[] = $sa->question_id;
        }

        $question_answers = QuestionAnswer::with('question')->get();

        $questions = Question::with('questionCategory','AdminUser')
                            ->where('reading_type',1)
                            ->whereNotIn('id',$qid)
                            ->inRandomOrder()
                            ->limit(4)
                            ->get();
        //dd($questions);

        $question = Question::with('questionCategory','AdminUser')
                            ->where('reading_type',1)
                            ->first();

        return view('users.exams.readings.reading_type1',compact('question_answers','questions','question','student_answers'));
    }

    public function examReadingType2()
    {
        $qid = [];
        $student_answers = StudentAnswer::where('user_id',auth()->user()->id)->get();
        foreach($student_answers as $sa){
            $qid[] = $sa->question_id;
        }

        $question_answers = QuestionAnswer::with('question')->get();

        $questions = Question::with('questionCategory','AdminUser')
                            ->where('reading_type',2)
                            ->whereNotIn('id',$qid)
                            ->inRandomOrder()
                            ->limit(4)
                            ->get();

        $question = Question::with('questionCategory','AdminUser')
                            ->where('reading_type',2)
                            ->first();

        return view('users.exams.readings.reading_type2',compact('question_answers','questions','question'));
    }

    public function examReadingType3()
    {
        $qid = [];
        $student_answers = StudentAnswer::where('user_id',auth()->user()->id)->get();
        foreach($student_answers as $sa){
            $qid[] = $sa->question_id;
        }

        $question_answers = QuestionAnswer::with('question')->get();

        $questions = Question::with('questionCategory','AdminUser')
                            ->where('reading_type',3)
                            ->whereNotIn('id',$qid)
                            ->inRandomOrder()
                            ->limit(4)
                            ->get();

        $question = Question::with('questionCategory','AdminUser')
                            ->where('reading_type',3)
                            ->first();

        return view('users.exams.readings.reading_type3',compact('question_answers','questions','question'));
    }

    public function examReadingType4()
    {
        $question_answers = QuestionAnswer::with('question')->get();

        $qid = [];
        $student_answers = StudentAnswer::where('user_id',auth()->user()->id)->get();
        foreach($student_answers as $sa){
            $qid[] = $sa->question_id;
        }

        $questions = Question::with('questionCategory','AdminUser')
                            ->where('reading_type',4)
                            ->whereNotIn('id',$qid)
                            ->inRandomOrder()
                            ->limit(4)
                            ->get();

        $question = Question::with('questionCategory','AdminUser')
                            ->where('reading_type',4)
                            ->first();

        return view('users.exams.readings.reading_type4',compact('question_answers','questions','question'));
    }

    public function examReadingType5()
    {
        $question_answers = QuestionAnswer::with('question')->get();

        $qid = [];
        $student_answers = StudentAnswer::where('user_id',auth()->user()->id)->get();
        foreach($student_answers as $sa){
            $qid[] = $sa->question_id;
        }

        $questions = Question::with('questionCategory','AdminUser')
                            ->where('reading_type',5)
                            ->whereNotIn('id',$qid)
                            ->inRandomOrder()
                            ->limit(4)
                            ->get();

        $question = Question::with('questionCategory','AdminUser')
                            ->where('reading_type',5)
                            ->first();

        return view('users.exams.readings.reading_type5',compact('question_answers','questions','question'));
    }

    public function examReadingType6()
    {
        $question_answers = QuestionAnswer::with('question')->get();

        $qid = [];
        $student_answers = StudentAnswer::where('user_id',auth()->user()->id)->get();
        foreach($student_answers as $sa){
            $qid[] = $sa->question_id;
        }

        $questions = Question::with('questionCategory','AdminUser')
                            ->where('reading_type',6)
                            ->whereNotIn('id',$qid)
                            ->inRandomOrder()
                            ->limit(4)
                            ->get();

        $question = Question::with('questionCategory','AdminUser')
                            ->where('reading_type',6)
                            ->first();

        return view('users.exams.readings.reading_type6',compact('question_answers','questions','question'));
    }

    public function examReadingType7()
    {
        $question_answers = QuestionAnswer::with('question')->get();

        $qid = [];
        $student_answers = StudentAnswer::where('user_id',auth()->user()->id)->get();
        foreach($student_answers as $sa){
            $qid[] = $sa->question_id;
        }

        $questions = Question::with('questionCategory','AdminUser')
                            ->where('reading_type',7)
                            ->whereNotIn('id',$qid)
                            ->inRandomOrder()
                            ->limit(4)
                            ->get();

        $question = Question::with('questionCategory','AdminUser')
                            ->where('reading_type',7)
                            ->first();

        return view('users.exams.readings.reading_type7',compact('question_answers','questions','question'));
    }

    public function examReadingType8()
    {
        $question_answers = QuestionAnswer::with('question')->get();

        $qid = [];
        $student_answers = StudentAnswer::where('user_id',auth()->user()->id)->get();
        foreach($student_answers as $sa){
            $qid[] = $sa->question_id;
        }

        $questions = Question::with('questionCategory','AdminUser')
                            ->where('reading_type',8)
                            ->whereNotIn('id',$qid)
                            ->inRandomOrder()
                            ->limit(4)
                            ->get();

        $question = Question::with('questionCategory','AdminUser')
                            ->where('reading_type',8)
                            ->first();

        return view('users.exams.readings.reading_type8',compact('question_answers','questions','question'));
    }
}
