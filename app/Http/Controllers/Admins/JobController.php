<?php

namespace App\Http\Controllers\Admins;

use App\Models\Admins\Job;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class JobController extends Controller
{
    /**
     * Display a listing of the resource.
     */

     function __construct()
     {
          $this->middleware('permission:job-list|job-create|job-edit|job-delete', ['only' => ['index','store']]);
          $this->middleware('permission:job-create', ['only' => ['create','store']]);
          $this->middleware('permission:job-edit', ['only' => ['edit','update']]);
          $this->middleware('permission:job-delete', ['only' => ['destroy']]);
     }


    public function index(Request $request)
    {
        if($request->search){
            $search = $request->search;
            $jobs = Job::where('name','LIKE',$search.'%')
                                ->latest('id')
                                ->paginate(10);
        }else{
            $jobs = Job::latest('id')->paginate(10);
        }

        return view('admins.jobs.index',compact('jobs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admins.jobs.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Validator::make($request->all(),[
            'name' => 'required',
        ])->validate();

        $job = new Job;
        $job->name = $request->name;
        $job->remarks = $request->remarks;
        $job->admin_user_id = $request->admin_user_id;
        $job->save();

        return redirect()->route('admin.jobs.index')->with('success','Succeeded.');
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
        $job = Job::find($id);
        return view('admins.jobs.edit',compact('job'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        Validator::make($request->all(),[
            'name' => 'required',
        ])->validate();

        $job = Job::find($id);
        $job->name = $request->name;
        $job->remarks = $request->remarks;
        $job->admin_user_id = $request->admin_user_id;
        $job->save();

        return redirect()->route('admin.jobs.index')->with('success','Updated.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Job::where('id',$id)->delete();
        return back()->with('success','Deleted.');
    }
}
