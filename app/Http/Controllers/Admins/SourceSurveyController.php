<?php

namespace App\Http\Controllers\Admins;

use Illuminate\Http\Request;
use App\Models\Admins\SourceSurvey;
use App\Http\Controllers\Controller;

class SourceSurveyController extends Controller
{
    /**
     * Display a listing of the resource.
     */

     function __construct()
     {
          $this->middleware('permission:source-survey-list|source-survey-create|source-survey-edit|source-survey-delete', ['only' => ['index','store']]);
          $this->middleware('permission:source-survey-create', ['only' => ['create','store']]);
          $this->middleware('permission:source-survey-edit', ['only' => ['edit','update']]);
          $this->middleware('permission:source-survey-delete', ['only' => ['destroy']]);
     }

    public function index(Request $request)
    {
        $source_surveys = SourceSurvey::when(request('search'),function($query){
            $query->where('name','LIKE',request('search').'%');
        })->latest('id')->paginate('10');

        return view('admins.source_surveys.index',compact('source_surveys'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admins.source_surveys.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $source_survey = new SourceSurvey;
        $source_survey->name = $request->name;
        $source_survey->save();

        return redirect()->route('admin.source_surveys.index')->with('success','Created Successfully!');
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
        $source_survey = SourceSurvey::find($id);
        return view('admins.source_surveys.edit',compact('source_survey'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $source_survey = SourceSurvey::find($id);
        $source_survey->name = $request->name;
        $source_survey->save();

        return redirect()->route('admin.source_surveys.index')->with('success','Updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        SourceSurvey::where('id',$id)->delete();
        return back()->with('success','Deleted Successfully!');
    }
}
