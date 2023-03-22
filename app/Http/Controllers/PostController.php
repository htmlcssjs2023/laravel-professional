<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // show data into table 
        // $posts = Post::all();
        $posts = Post::paginate(10);
        // $posts = Post::simplePaginate(8);
 
        return view('posts.index',['posts' => $posts]);
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
     * @param  \Illuminate\Http\Request 
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|min:4|max:15',
            'description' => 'required',
            'is_active' => 'required',
            'is_publish' => 'required'
        ]);

        // insert data into table
        // Post::create($request->all());

        Post::create([
            'title' => $request->title,
            'description' => $request->description,
            'is_active' => $request->is_active,
            'is_publish' => $request->is_publish
        ]);
        // dd('Values are saved');
        Session::flash('alert-success', 'form submitted successfully');

        // return redirect()->route('posts.create'); // redirect view old version
        return to_route('posts.create'); // Laravel 9

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
        $post = Post::find($id); // Find Id 
        if(! $post){ // If id is not exist then error throw 404
            abort(404);
        }


        return view('posts.show', ['post' => $post]);
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
