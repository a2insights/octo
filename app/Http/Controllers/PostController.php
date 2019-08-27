<?php

namespace App\Http\Controllers;

use App\Forms\PostForm;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use Kris\LaravelFormBuilder\FormBuilder;

/**
 * Class PostController
 *
 * @package App\Http\Controllers
 */
class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $blog =  Auth::user()->blog;

        $posts = Post::query()->where('blog_id' , '=' , $blog->id)->paginate(10);

        return view('post.index')->with(['posts' => $posts]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param FormBuilder $formBuilder
     * @return \Illuminate\Http\Response
     */
    public function create(FormBuilder $formBuilder)
    {
        $form = $formBuilder->create(PostForm::class, [
            'method' => 'POST',
            'url' => route('post.store')
        ]);

        return view('post.create', compact('form'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param FormBuilder $formBuilder
     * @return \Illuminate\Http\Response
     */
    public function store(FormBuilder $formBuilder)
    {
        $form = $formBuilder->create(PostForm::class);

        $data = $form->getFieldValues();

        if (!$form->isValid()) {
            return redirect()->back()->withErrors($form->getErrors())->withInput();
        }

        $blog = Auth::user()->blog;

        $data['blog_id'] = $blog->id;

        Post::create($data);

        toastr()->success('Successfully created post !');

        return redirect(route('post.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return void
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @param FormBuilder $formBuilder
     * @return \Illuminate\Http\Response
     */
    public function edit($id , FormBuilder $formBuilder)
    {
        $post = Post::find($id);

        $form = $formBuilder->create(\App\Forms\PostForm::class, [
            'method' => 'PUT',
            'url' => route('post.update' , $post->id),
            'model' => $post->toArray()
        ]);

        return view('post.edit')->with(['post' => $post , 'form' => $form]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param int $id
     * @param FormBuilder $formBuilder
     * @return \Illuminate\Http\Response
     */
    public function update($id , FormBuilder $formBuilder)
    {
        $form = $formBuilder->create(PostForm::class);

        $data = $form->getFieldValues();

        if (!$form->isValid()) {
            return redirect()->back()->withErrors($form->getErrors())->withInput();
        }

        $post = Post::find($id);

        $post->title = $data['title'];
        $post->content = $data['content'];

        $post->save();

        toastr()->success('Post updated successfully !');

        return redirect(route('post.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $deleted = Post::destroy($id);

        if ($deleted > 0){
            toastr()->success('Post successfully deleted !');
        }else{
            toastr()->error('Unable to delete post!');
        }

        return back();
    }
}
