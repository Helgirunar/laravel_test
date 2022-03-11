<?php

namespace App\Http\Controllers;
use App\Models\Post;
use App\Models\User;

use Illuminate\Http\Request;
//Index, show, create, store, edit, update, destroy
class PostCommentController extends Controller
{
    public function store(Post $post)
    {
        request()->validate([
            'body' => 'required'
        ]);

        session()->flash('message', 'Successfully posted the comment');

        $post->comments()->create([
            'user_id' => request()->user()->id,
            'body' => request()->input('body'),
            'post_id' => $post->id
        ]);

        return back();
    }
}
