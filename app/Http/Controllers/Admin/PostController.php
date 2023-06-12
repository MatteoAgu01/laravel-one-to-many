<?php

namespace App\Http\Controllers\Admin;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts =Post::all();
        return view('posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $form_data = $this->validation($request->all());
        $newPost = new Post();
        $newPost->fill($form_data);
        $newPost->save();
        return redirect()->route('admin.posts.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return view('posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $form_data = $this->validation($request->all());
        $post->update($form_data);
        return redirect()->route('admin.posts.index', $post->id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        return view('posts.edit', compact('post'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(post $post)
    {
        $post->delete();
        return redirect()->route('admin.posts.index')->with('message',
         "{$post->title} has been deleted");
    }

    private function validation($data)
	{
		$validator = Validator::make(
			$data,
			[
				'title' => 'required|max:255|min:3',
				'body' => 'required|min:50',
				'image' => 'max:600',
			],
			[
				'title.required' => 'Il titolo è obbligatorio',
				'title.max' => 'Il titolo non deve superare 255 caratteri',
				'title.min' => 'Il titolo deve contenere almeno tre caratteri',
				'body.min' => 'Il minimo dei caratteri accettati è 50',
				'body.max' => 'Il massimo dei caratteri accettati è la lungezza massima della descrizione è 600 caratteri',
				'image.max' => 'Devi inserire l\' url di un immagine di massimo 600 caratteri',

			]
		)->validate();
		return $validator;
	}
}
