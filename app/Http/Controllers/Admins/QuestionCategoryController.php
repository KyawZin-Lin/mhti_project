<?php

namespace App\Http\Controllers\Admins;

use Illuminate\Http\Request;
use App\Models\Admins\Course;
use App\Models\Admins\Module;
use App\Models\Admins\AcademicYear;
use App\Http\Controllers\Controller;
use App\Models\Admins\QuestionCategory;

class QuestionCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if($request->search){
            $search = $request->search;
            $question_categories = QuestionCategory::with('academicYear','course','module')
                                                    ->where('name',$search.'%')
                                                    ->latest('id')
                                                    ->get();
        }else{
            $question_categories = QuestionCategory::with('academicYear','course','module')
                                                    ->latest('id')->get();
        }

        $academic_years = AcademicYear::get();
        $courses = Course::get();
        $modules = Module::get();

        return view('admins.question_managements.question_categories.index',compact('question_categories','academic_years','courses','modules'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $academic_years = AcademicYear::get();
        $courses = Course::get();
        $modules = Module::get();

        return view('admins.question_managements.question_categories.create',compact('academic_years','courses','modules'));
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
        //
    }
}
