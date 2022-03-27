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
            $date = "";
            $valor = "";
    
            if ($date==''){
               $posts = Post::select('title_post','description_post','created_at')
                               ->orderBy('id', 'desc')->paginate(10);
            }
            else{
                $posts = Post::select('id','number_bill','total_bill')
                            ->where("created_at", 'like', '%'. $date . '%')
                            ->orderBy('id', 'desc')->paginate(10);
            }
    
           return view('viewBlogs', compact('posts'));

        } catch (\Throwable $th) {
            throw $th;
        }
        // $search = $request->search;
        // $valor = $request->valor;
       

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
                        ->orderBy('created_at', 'desc')->paginate(10);
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
