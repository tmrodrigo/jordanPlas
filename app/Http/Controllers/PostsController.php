<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;


class PostsController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::all();
        return view('backend.posts.postsList', [
            'posts' => $posts
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.posts.postCreate', [

        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Post $post)
    {
        $this->validate($request, [
            'name' => 'required|max:255',
            'description' => 'required|max:255',
            'image' => 'required|mimes:jpg,JPG,JPEG,jpeg|max:2500',
        ], [
            'name.required' => 'Título requerido',
            'name.max' => 'El título no debe poseer más de 250 caracteres',
            'description.required' => 'La descripción es requerida',
            'descripci.max' => 'La descripción no debe tener más de 250 caracteres',
            'image.required' => 'La imagen es requerida',
            'image.mimes' => 'La imagen debe ser formato jpg',
            'images.max' => 'La imagen no debe pesar más de 2.5 mb'
        ]);

        $post = new Post();
        $post->name = $request["name"];
        $post->description = $request["description"];

        $image = $request->file("image");
        $name = str_replace(' ', '-', $post->name) . "." . $image->extension();
        $folder = "novedades";
        $path = $image->storePubliclyAs($folder, strtolower($name));
        $post->image = $path;

        $post->save();

        return redirect('backend/posts')->with('message', 'Novedad cargada con éxito');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return view('backend.posts.post', [
            'post' => $post,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $this->validate($request, [
            'name' => 'required|max:255',
            'description' => 'required|max:255',
            'image' => 'required|mimes:jpg,JPG,JPEG,jpeg|max:2500',
        ], [
            'name.required' => 'Título requerido',
            'name.max' => 'El título no debe poseer más de 250 caracteres',
            'description.required' => 'La descripción es requerida',
            'descripci.max' => 'La descripción no debe tener más de 250 caracteres',
            'image.required' => 'La imagen es requerida',
            'image.mimes' => 'La imagen debe ser formato jpg',
            'images.max' => 'La imagen no debe pesar más de 2.5 mb'
        ]);

      $post->name = $request['name'];
      $post->description = $request['description'];
      $post->image = $request['image'];

      $image = $request->file("image");
      $name = str_replace(' ', '-', $post->name) . "." . $image->extension();
      $folder = "novedades";
      $path = $image->storePubliclyAs($folder, strtolower($name));
      $post->image = $path;

      $post->save();

      return redirect('backend/posts')->with('message', 'Novedad actualizada');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->delete();
        return redirect( '/backend/posts');
    }
}
