<?php

namespace App\Http\Controllers\Users;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Admins\QuestionListening;
use App\Models\Users\StudentAnswerListening;

class ListeningQuestionController extends Controller
{
    public function examListeningType1()
    {
        $qid = [];
        $student_answers = StudentAnswerListening::where('user_id',auth()->user()->id)->get();
        foreach($student_answers as $sa){
            $qid[] = $sa->question_id;
        }

        $questions = QuestionListening::with('questionCategory','AdminUser')
                            ->where('listening_type',1)
                            ->whereNotIn('id',$qid)
                            ->inRandomOrder()
                            ->limit(4)
                            ->get();

        $question = QuestionListening::with('questionCategory','AdminUser')
                            ->where('listening_type',1)
                            ->first();

        return view('users.exams.listenings.listening_type1',compact('questions','question'));
    }

    public function examListeningType2()
    {
        $qid = [];
        $student_answers = StudentAnswerListening::where('user_id',auth()->user()->id)->get();
        foreach($student_answers as $sa){
            $qid[] = $sa->question_id;
        }

        $questions = QuestionListening::with('questionCategory','AdminUser')
                            ->where('listening_type',2)
                            ->whereNotIn('id',$qid)
                            ->inRandomOrder()
                            ->limit(4)
                            ->get();

        $question = QuestionListening::with('questionCategory','AdminUser')
                            ->where('listening_type',2)
                            ->first();

        return view('users.exams.listenings.listening_type2',compact('questions','question'));
    }

    public function examListeningType3()
    {
        $qid = [];
        $student_answers = StudentAnswerListening::where('user_id',auth()->user()->id)->get();
        foreach($student_answers as $sa){
            $qid[] = $sa->question_id;
        }

        $questions = QuestionListening::with('questionCategory','AdminUser')
                            ->where('listening_type',3)
                            ->whereNotIn('id',$qid)
                            ->inRandomOrder()
                            ->limit(4)
                            ->get();

        $question = QuestionListening::with('questionCategory','AdminUser')
                            ->where('listening_type',3)
                            ->first();

        return view('users.exams.listenings.listening_type3',compact('questions','question'));
    }

    public function examListeningType4()
    {
        $qid = [];
        $student_answers = StudentAnswerListening::where('user_id',auth()->user()->id)->get();
        foreach($student_answers as $sa){
            $qid[] = $sa->question_id;
        }

        $questions = QuestionListening::with('questionCategory','AdminUser')
                            ->where('listening_type',4)
                            ->whereNotIn('id',$qid)
                            ->inRandomOrder()
                            ->limit(4)
                            ->get();

       $question = QuestionListening::with('questionCategory','AdminUser')
                            ->where('listening_type',4)
                            ->first();

        return view('users.exams.listenings.listening_type4',compact('questions','question'));
    }

    public function examListeningType5()
    {
        $qid = [];
        $student_answers = StudentAnswerListening::where('user_id',auth()->user()->id)->get();
        foreach($student_answers as $sa){
            $qid[] = $sa->question_id;
        }

        $questions = QuestionListening::with('questionCategory','AdminUser')
                            ->where('listening_type',5)
                            ->whereNotIn('id',$qid)
                            ->inRandomOrder()
                            ->limit(4)
                            ->get();

    $question = QuestionListening::with('questionCategory','AdminUser')
                            ->where('listening_type',5)
                            ->first();

        return view('users.exams.listenings.listening_type5',compact('questions','question'));
    }

    public function examListeningType6()
    {
        $qid = [];
        $student_answers = StudentAnswerListening::where('user_id',auth()->user()->id)->get();
        foreach($student_answers as $sa){
            $qid[] = $sa->question_id;
        }

        $questions = QuestionListening::with('questionCategory','AdminUser')
                            ->where('listening_type',6)
                            ->whereNotIn('id',$qid)
                            ->inRandomOrder()
                            ->limit(4)
                            ->get();

        $question = QuestionListening::with('questionCategory','AdminUser')
                            ->where('listening_type',6)
                            ->first();
        return view('users.exams.listenings.listening_type6',compact('questions','question'));
    }

    public function examListeningType7()
    {
        $qid = [];
        $student_answers = StudentAnswerListening::where('user_id',auth()->user()->id)->get();
        foreach($student_answers as $sa){
            $qid[] = $sa->question_id;
        }

        $questions = QuestionListening::with('questionCategory','AdminUser')
                            ->where('listening_type',7)
                            ->whereNotIn('id',$qid)
                            ->inRandomOrder()
                            ->limit(4)
                            ->get();

        $question = QuestionListening::with('questionCategory','AdminUser')
                            ->where('listening_type',7)
                            ->first();

        return view('users.exams.listenings.listening_type7',compact('questions','question'));
    }

    public function examListeningType8()
    {
        $qid = [];
        $student_answers = StudentAnswerListening::where('user_id',auth()->user()->id)->get();
        foreach($student_answers as $sa){
            $qid[] = $sa->question_id;
        }

        $questions = QuestionListening::with('questionCategory','AdminUser')
                            ->where('listening_type',8)
                            ->whereNotIn('id',$qid)
                            ->inRandomOrder()
                            ->limit(4)
                            ->get();

        $question = QuestionListening::with('questionCategory','AdminUser')
                            ->where('listening_type',8)
                            ->first();

        return view('users.exams.listenings.listening_type8',compact('questions','question'));
    }
}
