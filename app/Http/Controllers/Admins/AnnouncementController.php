<?php

namespace App\Http\Controllers\Admins;

use Image;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admins\Announcement;

class AnnouncementController extends Controller
{
    /**
     * Display a listing of the resource.
     */

     function __construct()
     {
          $this->middleware('permission:announcement-list|announcement-create|announcement-edit|announcement-delete', ['only' => ['index','store']]);
          $this->middleware('permission:announcement-create', ['only' => ['create','store']]);
          $this->middleware('permission:announcement-edit', ['only' => ['edit','update']]);
          $this->middleware('permission:announcement-delete', ['only' => ['destroy']]);
     }

    public function index(Request $request)
    {
        if($request->search){
            $search = $request->search;
            $announcements = Announcement::where('title','LIKE',$search.'%')
                                ->latest('id')
                                ->paginate(10);

            $announcements_count = Announcement::where('title','LIKE',$search.'%')
                                ->latest('id')
                                ->get()
                                ->count();

        }else{
            $announcements = Announcement::latest('id')->paginate(10);

            $announcements_count = Announcement::latest('id')->get()->count();
        }

        return view('admins.announcements.index',compact('announcements','announcements_count'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admins.announcements.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Validator::make($request->all(), [
            'title' => 'required',
        ])->validate();

            $announcement = new Announcement;
            if($request->file("photo")) {
                $file=$request->file("photo");
                $filename = time().'_'.$file->getClientOriginalName();
                $path=public_path('photos/announcements');
                $img = Image::make($file);
                $img->resize(750, 300, function ($const) {
                $const->aspectRatio();
                })->save($path.'/'.$filename);

                $announcement->photo = $filename;
            }

            $announcement->title = $request->title;
            $announcement->description = $request->description;
            $announcement->admin_user_id = auth()->user()->id;
            $announcement->save();

            return redirect()->route('admin.announcements.index')->with('success','Succeeded.');
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
        $announcement = Announcement::find($id);
        return view('admins.announcements.edit',compact('announcement'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        Validator::make($request->all(), [
            'title' => 'required',
        ])->validate();

            $announcement = Announcement::find($id);

            if($announcement->photo != null && $request->photo){

                if(file_exists(public_path('photos/announcements/'.$announcement->photo))){

                    unlink('photos/announcements/'.$announcement->photo);

                }
            }

            if($request->file("photo")) {
                $file=$request->file("photo");
                $filename = time().'_'.$file->getClientOriginalName();
                $path=public_path('photos/announcements');
                $img = Image::make($file);
                $img->resize(750, 300, function ($const) {
                $const->aspectRatio();
                })->save($path.'/'.$filename);

                $announcement->photo = $filename;
            }

            $announcement->title = $request->title;
            $announcement->description = $request->description;
            $announcement->admin_user_id = auth()->user()->id;
            $announcement->save();

            return redirect()->route('admin.announcements.index')->with('success','Updated.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $announcement = Announcement::find($id);

        if($announcement->photo != null){

                if(file_exists(public_path('photos/announcements/'.$announcement->photo))){

                    unlink('photos/announcements/'.$announcement->photo);

                }
            }

        $announcement->delete();


        return back()->with('success','Deleted.');
    }
}
