<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function __construct()
    {
        $this->middleware('web');
    }

    public function index(Request $request)
    {
        $blog = Blog::query()
            ->where('guard_name' , '=' ,  $request->blog_guard_name)->firstOrFail();

        $posts = $blog->posts()->paginate(10);

        return view("$blog->theme::index")->with(
            [
                'posts' => $posts ,
                'blog' => $blog
            ]
        );
    }
}
