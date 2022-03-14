<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\User;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class PostController extends Controller
{
    public function index() {
        return view('posts.index', [
            'posts' => Post::latest()->filter(request(['search', 'category', 'author']))->paginate(12)->withQueryString()
        ]);
    }

    public function show(Post $post) {

        //session()->flash('message', 'You opened the post: ' . $post->title);
        return view('posts.show',[
            'post' => $post,
        ]);
    }

    public function author(User $author) {
        return view('posts.index', [
            'posts' => $author->posts,
        ]);
    }

}
