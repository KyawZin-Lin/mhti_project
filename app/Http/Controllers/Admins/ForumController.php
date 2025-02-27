<?php

namespace App\Http\Controllers\Admins;

use App\Models\Admins\Forum;
use Illuminate\Http\Request;
use App\Models\Users\ForumComment;
use App\Http\Controllers\Controller;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Validator;

class ForumController extends Controller
{
    /**
     * Display a listing of the resource.
     */

     function __construct()
     {
          $this->middleware('permission:forum-list|forum-create|forum-edit|forum-delete', ['only' => ['index','store']]);
          $this->middleware('permission:forum-create', ['only' => ['create','store']]);
          $this->middleware('permission:forum-edit', ['only' => ['edit','update']]);
          $this->middleware('permission:forum-delete', ['only' => ['destroy']]);
     }

    public function index(Request $request)
    {
        if($request->search){
            $search = $request->search;
            $forums = Forum::where('title','LIKE',$search.'%')
                                ->latest('id')
                                ->paginate(10);

            $forums_count = Forum::where('title','LIKE',$search.'%')
                                ->latest('id')
                                ->get()
                                ->count();

        }else{
            $forums = Forum::latest('id')->paginate(10);

            $forums_count = Forum::latest('id')->get()->count();
        }

        return view('admins.forums.index',compact('forums','forums_count'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admins.forums.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Validator::make($request->all(), [
            'title' => 'required',
        ])->validate();

            $forum = new Forum;
            if($request->file("photo")) {
                $file=$request->file("photo");
                $filename = time().'_'.$file->getClientOriginalName();
                $path=public_path('photos/forums');
                $img = Image::make($file);
                $img->resize(750, 300, function ($const) {
                $const->aspectRatio();
                })->save($path.'/'.$filename);

                $forum->photo = $filename;
            }

            $forum->title = $request->title;
            $forum->description = $request->description;
            $forum->admin_user_id = auth()->user()->id;
            $forum->save();

            return redirect()->route('admin.forums.index')->with('success','Succeeded.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $forum = Forum::find($id);
        $forum_comments = ForumComment::where('forum_id',$id)->latest('id')->get();
        return view('admins.forums.comment',compact('forum','forum_comments'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $forum = Forum::find($id);
        return view('admins.forums.edit',compact('forum'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        Validator::make($request->all(), [
            'title' => 'required',
        ])->validate();

            $forum = Forum::find($id);

            if($forum->photo != null && $request->photo){

                if(file_exists(public_path('photos/forums/'.$forum->photo))){

                    unlink('photos/forums/'.$forum->photo);

                }
            }

            if($request->file("photo")) {
                $file=$request->file("photo");
                $filename = time().'_'.$file->getClientOriginalName();
                $path=public_path('photos/forums');
                $img = Image::make($file);
                $img->resize(750, 300, function ($const) {
                $const->aspectRatio();
                })->save($path.'/'.$filename);

                $forum->photo = $filename;
            }

            $forum->title = $request->title;
            $forum->description = $request->description;
            $forum->admin_user_id = auth()->user()->id;
            $forum->save();

            return redirect()->route('admin.forums.index')->with('success','Updated.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $forum = Forum::find($id);

        if($forum->photo != null){

                if(file_exists(public_path('photos/forums/'.$forum->photo))){

                    unlink('photos/forums/'.$forum->photo);

                }
            }

        $forum->delete();

        ForumComment::where('forum_id',$id)->delete();

        return back()->with('success','Deleted.');
    }
}
