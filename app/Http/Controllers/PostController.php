<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class PostController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth')->except('index', 'show');
                                    
    }
    public function index(){
        $posts = Post::all();
        return view('posts.index', compact('posts'));
    }

    public function show($id){
        $post = Post::find($id);
        return view('posts.show', compact('post'));
    }

    public function create(){
          return view('posts.create');
    }

    public function store(){
        request()->validate([
            'title' => 'required|min:3|max:255',
            'body' => 'required|min:3|max:65535'
        ]);
        Post::create([
            'title' => request('title'),
            'body' => request('body'),
            'user_id' => auth()->id(),
            // 'slug' => str_replace(' ', '-', strtolower(request('title')))
            // Koristimo sluggable plugin umjesto gornje naredbe  \app\Post.php
            // https://github.com/cviebrock/eloquent-sluggable
            // $ composer require cviebrock/eloquent-sluggable:^4.8


        ]);

        return redirect()->route('posts.index')->withFlashMessage('Objava je dodana uspješno');
  }
  
  public function destroy($id)
  {
      $post = Post::find($id);
      $post->delete();
      return redirect()->route('posts.index')->withFlashMessage("Post $post->title obrisan je uspješno.");
  }

  public function edit($id)
  {
      $post = Post::find($id);
      return view('posts.edit', compact('post'));
  }
  
  public function update(Request $request, post $post)
  {
              //dd($request);
              $request->validate([
                  'title' => 'required|string|max:255',
                  'body' => 'required|min:3|max:65535'.$post->id
               


              ]);
              //$user =User::find($id);
              //$post->id = 6;
              $post->title = $request['title'];
              $post->body = $request['body'];
              $post->user_id = auth()->id();


              $post->save();
              return redirect()->route('posts.index')->withFlashMessage("$post->title uspješno je ažuriran.");
  }




}
