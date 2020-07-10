<?php

namespace App\Http\Controllers;

use App\Forms\PostForm;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use Kris\LaravelFormBuilder\FormBuilder;

class PostController extends Controller
{
    public function index()
    {
        $blog =  Auth::user()->blog();

        $posts = Post::query()
            ->where('blog_id' , '=' , $blog->id)
            ->paginate(10);

        return view('post.index')->with(['posts' => $posts]);
    }

    public function create(FormBuilder $formBuilder)
    {
        $form = $formBuilder->create(PostForm::class, [
            'method' => 'POST',
            'url' => route('post.store', tenant('id'))
        ]);

        return view('post.create', compact('form'));
    }

    public function store(FormBuilder $formBuilder)
    {
        $form = $formBuilder->create(PostForm::class);

        $data = $form->getFieldValues();

        if (!$form->isValid()) {
            return redirect()->back()->withErrors($form->getErrors())->withInput();
        }

        $blog = Auth::user()->blog();

        $data['blog_id'] = $blog->id;

        Post::create($data);

        notify()->success('Successfully created post !');

        return redirect(route('post.index', tenant('id')));
    }

    public function show($id)
    {
        //
    }

    public function edit($id , FormBuilder $formBuilder)
    {
        $post = Post::find($id);

        $this->authorize('update', $post);

        $form = $formBuilder->create(\App\Forms\PostForm::class, [
            'method' => 'PUT',
            'url' => route('post.update', [tenant('id'), $post->id ]),
            'model' => $post->toArray()
        ]);

        return view('post.edit')->with(['post' => $post , 'form' => $form]);

    }

    public function update($id , FormBuilder $formBuilder)
    {
        $form = $formBuilder->create(PostForm::class);

        $data = $form->getFieldValues();

        if (!$form->isValid())   {
            return redirect()->back()->withErrors($form->getErrors())->withInput();
        }

        $post = Post::find($id);

        $this->authorize('update', $post);


        $post->title = $data['title'];
        $post->content = $data['content'];

        $post->save();

        notify()->success('Post updated successfully !');

        return redirect(route('post.index', tenant('id')));
    }

    public function destroy($id)
    {
        $post = Post::find($id);

        $this->authorize('update', $post);

        $post->delete();

        notify()->success('Post successfully deleted !');

        return back();
    }
}
