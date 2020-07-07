<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index(Request $request)
    {
        $blog = Blog::query()
            ->where('path' , '=' ,  'blogs/'. $request->path)
            ->firstOrFail();

        $posts = $blog->posts()->paginate(10);

        return view("$blog->theme::index")->with(
            [
                'posts' => $posts ,
                'blog' => $blog
            ]
        );
    }
}
