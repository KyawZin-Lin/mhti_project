<?php

namespace App\Http\Controllers\Admins;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Admins\FutureInterest;

class FutureInterestController extends Controller
{
    /**
     * Display a listing of the resource.
     */

     function __construct()
     {
          $this->middleware('permission:future-interest-list|future-interest-create|future-interest-edit|future-interest-delete', ['only' => ['index','store']]);
          $this->middleware('permission:future-interest-create', ['only' => ['create','store']]);
          $this->middleware('permission:future-interest-edit', ['only' => ['edit','update']]);
          $this->middleware('permission:future-interest-delete', ['only' => ['destroy']]);
     }

    public function index(Request $request)
    {
        $future_interests = FutureInterest::when(request('search'),function($query){
            $query->where('name','LIKE',request('search').'%');
        })->latest('id')->paginate('10');

        return view('admins.future_interests.index',compact('future_interests'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admins.future_interests.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $future_interest = new FutureInterest;
        $future_interest->name = $request->name;
        $future_interest->save();

        return redirect()->route('admin.future_interests.index')->with('success','Created Successfully!');
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
        $future_interest = FutureInterest::find($id);
        return view('admins.future_interests.edit',compact('future_interest'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $future_interest = FutureInterest::find($id);
        $future_interest->name = $request->name;
        $future_interest->save();

        return redirect()->route('admin.future_interests.index')->with('success','Updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        FutureInterest::where('id',$id)->delete();
        return back()->with('success','Deleted Successfully!');
    }
}
