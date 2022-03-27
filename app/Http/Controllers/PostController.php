<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    /**
     * List Posts DentOs
     */
    public function index(Request $request)
    {
        try {
            //We analyze if the index requires a search date for the posts created in the blog
            $date =  $request->date ? $request->date : '';
    
            if ($date==''){
               $posts = Post::select('id','title_post','description_post','created_at')
                               ->orderBy('id', 'desc')->paginate(100);
            }
            else{
                $posts = Post::select('id','title_post','description_post','created_at')
                            ->where("created_at", 'like', '%'. $date . '%')
                            ->orderBy('id', 'desc')->paginate(100);
            }
    
           return view('viewBlogs', compact('posts'));

        } catch (\Throwable $th) {
            throw $th;
        }
       

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            // validate fields

            request()->validate([
                'title_post' => 'required|max:40|min:6',
                'description_post' => 'required|max:255|min:5',
            ]);

            $post = new Post();
            $post->title_post = $request->title_post;
            $post->description_post = $request->description_post;
            $post->user_id = Auth::id();
            $post->save();

            $posts = Post::select('title_post','description_post','created_at')
                        ->where('user_id', '=', $post->user_id)
                        ->orderBy('created_at', 'desc')->paginate(100);
            return view('home', compact('posts'));

        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function newPost(Request $request)
    {
        try {
            //we receive the data from the api and we go through the array to save in the db
            $arrayData = $request->data;
            $user_id = Auth::id();

            for ($i=0; $i < count($arrayData) ; $i++) {

                $post = new Post();
                $post->title_post = $request->data[$i]['title'];
                $post->description_post = $request->data[$i]['body'];
                $post->user_id = Auth::id();
                $post->save();

            }

            $posts = Post::select('title_post','description_post','created_at')
                        ->where('user_id', '=', $user_id)
                        ->orderBy('created_at', 'desc')->paginate(100);
            return view('home', compact('posts'));

        } catch (\Throwable $th) {
            throw $th;
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
