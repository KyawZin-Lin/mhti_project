<?php

namespace App\Http\Controllers\Admins;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Users\StudentAnswerListening;

class StudentAnswerListeningController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
    //    if($request->search)
    //     {
    //         $search = Carbon::parse($request->search);

    //         $student_answers = StudentAnswerListening::whereDate('created_at',$search)
    //                                             ->latest('id')
    //                                             ->paginate(10);

    //         $student_answers_count = StudentAnswerListening::whereDate('created_at',$search)
    //                                             ->latest('id')
    //                                             ->get()
    //                                             ->count();
    //     }else{
    //         $student_answers = StudentAnswerListening::latest('id')->paginate(10);

    //         $student_answers_count = StudentAnswerListening::latest('id')->get()->count();
    //     }

        $student_answers = StudentAnswerListening::select('student_id')->distinct()->latest('id')->paginate(10);
        $students = StudentAnswerListening::get();

        $student_answers_count = StudentAnswerListening::select('student_id')->distinct()->get()->count();


        return view('admins.student_answers.listenings.index',compact('student_answers','students','student_answers_count'));
    }

    public function detailList(Request $request,$id)
    {
       if($request->search)
        {
            $search = Carbon::parse($request->search);

            $student_answers = StudentAnswerListening::where('student_id',$id)
                                                ->whereDate('created_at',$search)
                                                ->latest('id')
                                                ->paginate(10);

            $student_answers_count = StudentAnswerListening::where('student_id',$id)
                                                ->whereDate('created_at',$search)
                                                ->latest('id')
                                                ->get()
                                                ->count();
        }else{
            $student_answers = StudentAnswerListening::where('student_id',$id)
                                                ->latest('id')->paginate(10);

            $student_answers_count = StudentAnswerListening::where('student_id',$id)
                                                ->latest('id')->get()->count();
        }


        return view('admins.student_answers.listenings.detail_list',compact('student_answers','student_answers_count','id'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
        StudentAnswerListening::where('student_id',$id)->delete();
        return back()->with('success','Deleted.');
    }
}
