<?php

namespace App\Http\Controllers\Users;

use Illuminate\Http\Request;
use App\Models\Admins\Announcement;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\Models\Admins\AnnouncementComment;

class AnnouncementController extends Controller
{
    function __construct()
     {

        // $this->middleware('permission:announcement-detail', ['only' => ['detail']]);

        //   $this->middleware('permission:user-list|user-create|user-edit|user-delete', ['only' => ['index','store']]);
        //   $this->middleware('permission:user-create', ['only' => ['create','store']]);
        //   $this->middleware('permission:user-edit', ['only' => ['edit','update']]);
        //   $this->middleware('permission:user-delete', ['only' => ['destroy']]);
     }

    public function index(Request $request)
    {
        if($request->title)
        {
            $search = $request->title;
            $announcements = Announcement::with('adminUser')
                                        ->where('title','LIKE','%'.$search.'%')
                                        ->latest('id')
                                        ->paginate(4);
        }else{
            $announcements = Announcement::with('adminUser')->latest('id')->paginate(4);
        }

        return view('users.announcements.index',compact('announcements'));
    }

    public function detail($id)
    {
        $announcement = Announcement::with('adminUser')
                                    ->find($id);

        $announcement_comments = AnnouncementComment::with('student','announcement')
                                                                ->where('announcement_id',$id)
                                                                ->latest('id')
                                                                ->paginate(4);

        return view('users.announcements.detail',compact('announcement','announcement_comments'));
    }

    public function commentStore(Request $request)
    {
        Validator::make($request->all(),[
            'comment' => 'required',
        ])->validate();

        $announcement_comment = new AnnouncementComment;
        $announcement_comment->student_id = auth()->user()->student_id;
        $announcement_comment->announcement_id = $request->announcement_id;
        $announcement_comment->comment = $request->comment;
        $announcement_comment->save();

        return back()->with('success','Succeeded.');
    }
}
