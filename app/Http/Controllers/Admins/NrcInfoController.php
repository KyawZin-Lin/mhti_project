<?php

namespace App\Http\Controllers\Admins;

use Illuminate\Http\Request;
use App\Models\Admins\NrcInfo;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class NrcInfoController extends Controller
{
    /**
     * Display a listing of the resource.
     */

     function __construct()
     {
          $this->middleware('permission:nrc-info-list|nrc-info-create|nrc-info-edit|nrc-info-delete', ['only' => ['index','store']]);
          $this->middleware('permission:nrc-info-create', ['only' => ['create','store']]);
          $this->middleware('permission:nrc-info-edit', ['only' => ['edit','update']]);
          $this->middleware('permission:nrc-info-delete', ['only' => ['destroy']]);
     }


    public function index(Request $request)
    {
        if($request->search){
            $search = $request->search;
            $nrc_infos = NrcInfo::where('township_abbreviation','LIKE',$search.'%')
                                ->orderBy('no','DESC')
                                ->paginate(10);

            $nrc_infos_count = NrcInfo::where('township_abbreviation','LIKE',$search.'%')
                                ->orderBy('no','DESC')
                                ->get()
                                ->count();

        }else{
            $nrc_infos = NrcInfo::orderBy('no','DESC')->paginate(10);

            $nrc_infos_count = NrcInfo::orderBy('no','DESC')->get()->count();
        }

        return view('admins.nrc_infos.index',compact('nrc_infos','nrc_infos_count'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admins.nrc_infos.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Validator::make($request->all(),[
            'no' => 'required',
            'township_abbreviation' => 'required',
        ])->validate();

        $nrc_info = new NrcInfo;
        $nrc_info->no = $request->no;
        $nrc_info->township_abbreviation = $request->township_abbreviation;
        $nrc_info->save();

        return redirect()->route('admin.nrc_infos.index')->with('success','Succeeded.');
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
        $nrc_info = NrcInfo::find($id);
        return view('admins.nrc_infos.edit',compact('nrc_info'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        Validator::make($request->all(),[
            'no' => 'required',
            'township_abbreviation' => 'required',
        ])->validate();

        $nrc_info = NrcInfo::find($id);
        $nrc_info->no = $request->no;
        $nrc_info->township_abbreviation = $request->township_abbreviation;
        $nrc_info->save();

        return redirect()->route('admin.nrc_infos.index')->with('success','Updated.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        NrcInfo::where('id',$id)->delete();
        return back()->with('success','Deleted.');
    }
}
