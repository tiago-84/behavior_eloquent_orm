<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    public function index()
    {

        
       $posts = Post::where('created_at', '>=', date('Y-m-d H:i:s'))->orderBy('title', 'desc')->get();
    //      foreach($posts as $post){
    //          echo"
    //         <h1>{$post->title}</h1>
    //         <h2>{$post->subtitle}</h2>
    //         <p>{$post->description}</p>
    //         <hr>
    //     ";
    // }

        // $post = Post::where('created_at', '>=', date('Y-m-d H:i:s'))->first();
        // echo"
        //         <h1>{$post->title}</h1>
        //         <h2>{$post->subtitle}</h2>
        //         <p>{$post->description}</p>
        //         <hr>
        //     ";

        
        // $post = Post::where('created_at', '>=', date('Y-m-d H:i:s'))->firstOrFail();

        //     echo"
        //         <h1>{$post->title}</h1>
        //         <h2>{$post->subtitle}</h2>
        //         <p>{$post->description}</p>
        //         <hr>
        //     ";
     
            // $post = Post::find(1);
            //     echo"
            //     <h1>{$post->title}</h1>
            //     <h2>{$post->subtitle}</h2>
            //     <p>{$post->description}</p>
            //     <hr>
            // ";

            //max - min - sum - count - svg   
           // $posts = Post::where('created_at', '>=', date('Y-m-d H:i:s'))->max('title');
                // foreach($posts as $post){
                //     echo"
                //     <h1>{$post->title}</h1>
                //     <h2>{$post->subtitle}</h2>
                //     <p>{$post->description}</p>
                //     <hr>
                // ";

            $posts = Post::all();
            return view('posts.index', ['posts' => $posts]);
    }

    public function create()
    {
        return view('posts.create');
    }


    public function store(Request $request)
    {
        //Object -> Prop -> Save
        $post = new Post();
        $post->title = $request->title;
        $post->subtitle = $request->subtitle;
        $post->description = $request->description;
        $post->save();

        
        //mass assignment
        // Post::create([
        //     'title' => $request->title,
        //     'subtitle' => $request->subtitle,
        //     'description' => $request->description            
        // ]);


        // $post = Post::firstOrNew([
        //     'title' => 'test2'
        // ], [
        //     'subtitle' => 'test2',
        //     'description' => 'test2'
        // ]);
        // $post->save();

        // $post = Post::firstOrCreate([
        //     'title' => 'test5',
        //     'subtitle' => 'test5'
        // ], [
            
        //     'description' => 'test5'
        // ]);
        // var_dump($post);

        return redirect()->route('post.index');       
        
    }

    public function show(Post $post)
    {

    }

    public function edit(Post $post)
    {
        
        return view('posts.edit', ['post' => $post]);

    }

    public function update(Request  $request, Post $post)
    {
        //Obj - prop - save
        //$post = new Post;
        $post = Post::find($post->id);
        $post->title = $request->title;
        $post->subtitle = $request->subtitle;
        $post->description = $request->description;
        $post->save();


        // $post = Post::updateOrCreate([
        //     'title' => 'teste5'
        // ], [
        //     'subtitle' => 'teste6',
        //     'description' => 'teste6'
        // ]);

       // Post::where('created_at', '>=', date('Y-m-d H:i:s'))->update(['description' => 'teste']);
        //var_dump($post);
        return redirect()->route('posts.index');

    }

    public function destroy(Post $post)
    {
        //var_dump($post);
        //Post::find($post->id)->delete();
        //Post::destroy([2, 3]); este não funcionou.
        //Post::destroy($post->id);
        //Post::where('created_at', '>=', date('Y-m-d H:i:s'))->delete(); este não funcionou.
        return redirect()->route('posts.index');
    }
}

