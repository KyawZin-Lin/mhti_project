<?php

namespace App\Http\Controllers\Users;

use Illuminate\Http\Request;
use App\Models\Users\StudentAnswer;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class StudentAnswerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
        Validator::make($request->all(),[
            'answer' => 'required',
        ])->validate();

        $student_answer = new StudentAnswer;
        $student_answer->question_id = $request->question_id;
        $student_answer->student_id = auth()->user()->student_id;
        $student_answer->answer = $request->answer;
        $student_answer->user_id = auth()->user()->id;
        $student_answer->save();

        return back()->with('success','Saved Successfully.');
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
        //
    }
}
