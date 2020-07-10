<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BlogController extends Controller
{
    public function index(Request $request)
    {
        $blog =  Auth::user()->blog();

        $posts = Post::query()
            ->where('blog_id' , '=' , $blog->id)
            ->paginate(10);

        return view("$blog->theme::index")->with(
            [
                'posts' => $posts ,
                'blog' => $blog
            ]
        );
    }
}
