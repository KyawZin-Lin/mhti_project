<?php

namespace App\Http\Controllers\Users;

use Illuminate\Http\Request;
use App\Models\Users\ForumComment;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class ForumCommentController extends Controller
{
    public function commentStore(Request $request)
    {
        Validator::make($request->all(),[
            'comment' => 'required',
        ])->validate();

        $forum_comment = new ForumComment;
        $forum_comment->student_id = auth()->user()->student_id;
        $forum_comment->forum_id = $request->forum_id;
        $forum_comment->comment = $request->comment;
        $forum_comment->save();

        return back()->with('success','Succeeded.');
    }
}
