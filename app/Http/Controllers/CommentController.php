<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class CommentController extends Controller
{
    public function store(Request $request){
        $formFields = $request->validate([
            'comment' => "required|max:500",

        ]);
        $formFields['user_id'] = Auth::id();
        $formFields['post_id'] = $request->post_id;

        Comment::create($formFields);


        return back()->with("success","comment added");
    }
    public function edit(Comment $comment){
        Gate::authorize("update",$comment);
        return view("comment.edit",compact("comment"));
    }
    public function update(Request $request,Comment $comment){
        Gate::authorize("update",$comment);
        $formfields = $request->validate([
            'comment' => "required|max:500",
        ]);
        $comment->fill($formfields)->save();
        return back()->with("success","comment updated");
    }
    public function destroy(Comment $comment){
        Gate::authorize("delete",$comment);
        $comment->delete();
        return back()->with("success","deleted");
    }
}
