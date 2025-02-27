<?php

namespace App\Http\Controllers\Users;

use App\Models\Admins\Forum;
use Illuminate\Http\Request;
use App\Models\Users\ForumComment;
use App\Http\Controllers\Controller;

class ForumController extends Controller
{
    public function index(Request $request)
    {
        if($request->title)
        {
            $search = $request->title;
            $forums = Forum::with('adminUser')
                                        ->where('title','LIKE','%'.$search.'%')
                                        ->latest('id')
                                        ->paginate(4);
        }else{
            $forums = Forum::with('adminUser')->latest('id')->paginate(4);
        }

        $forum_comments = ForumComment::latest('id')->get();

        return view('users.forums.index',compact('forums','forum_comments'));
    }
}
