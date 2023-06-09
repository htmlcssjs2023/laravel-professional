<?php

namespace App\Http\Controllers;
use Illuminate\Support\Str;
use App\Http\Requests\Post\CreateRequest;
use App\Http\Requests\Post\UpdateRequest;
use App\Http\Requests\PostRequest;
use App\Models\Gallery;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

use function PHPUnit\Framework\fileExists;

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
        // $posts = Post::withTrashed()->paginate(10);
        $posts = Post::withTrashed()->paginate(10);
        // $posts = Post::simplePaginate(8);

        return view('posts.index', ['posts' => $posts]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $submittedData = view('posts.create');
        return $submittedData;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request 
     * @return \Illuminate\Http\Response
     */
    public function store(PostRequest $request)
    {

        // insert data into table
        // Post::create($request->all());

        // SAVE DATA 

        // check image is load or not
        $file = $request->file;
        if($file){
            $fileName = time(). '-'.$file->getClientOriginalName();
            // file path
            // $filePath = public_path().'/assets/images';
           // file move
        //    $file->move($filePath, $fileName);
        $filePath = '/';
          $file = Storage::disk('post')->put($filePath, $file);
          $fileName =basename($file);
            // dd($fileName);
          $gallery = Gallery::create([
                'name' => $fileName,
                'type' => Gallery::Type
           ]);

    // make a dynamic user_id
    $slug = Str::slug($request->title, '-');
    // dd($slug);

        $user = User::first();
        if($user){
            Post::create([
                'gallery_id' => $gallery->id,
                'title' => $request->title,
                'slug' => $slug,
                'user_id' => $user->id,
                'description' => $request->description,
                'is_active' => $request->is_active,
                'is_publish' => $request->is_publish,
               
            ]);
        }
      
        }
    
      

        // dd('Values are saved');
        Session::flash('alert-success', 'Post save successfully');

        // return redirect()->route('posts.create'); // redirect view old version
        return to_route('posts.create'); // Laravel 9

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {

        // $post = Post::find($id); // Find Id 
        // if (!$post) { // If id is not exist then error throw 404
        //     abort(404);
        // }


        return view('posts.show', ['post' => $post]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
        $post = Post::find($id); // Find Id 
        if (!$post) { // If id is not exist then error throw 404
            abort(404);
        }

        return view('posts.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PostRequest $request, $id)
    {
        $post = Post::find($id); // Find Id 
        if (!$post) { // If id is not exist then error throw 404
            abort(404);
        }
       
        $post->update([
            'title' => $request->title,
            'description' => $request->description,
            'is_active' => $request->is_active,
            'is_publish' => $request->is_publish
        ]);

        // return redirect()->route('posts.create'); // redirect view old version
        $request->session()->flash('alert-update', 'Deleted Successfully');
        return to_route('posts.edit'); // Laravel 9
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,$id)
    {
        $post = Post::find($id); // Find Id 
        if (!$post) { // If id is not exist then error throw 404
            abort(404);
        }

        $file = public_path(). $post->image->name;
        if(fileExists($file)){
            unlink($file);
        }

       
           

        $post->delete();

        // created session here 
        $request->session()->flash('alert-danger', 'Deleted Successfully');
        return to_route('posts.index');


        //  Post::find($id)->delete();
        // // return redirect()->route('posts.show')->withSuccess(__('Post delete successfully.'));
        // return back()->with('message', 'Deleted Successfully');
    }

    public function softDelete(Request $request, $id){
        $post = Post::onlyTrashed()->find($id);
        if(! $post){
            abort(404);
        }

        $post->update([
            'deleted_at' => null
        ]);

        $request->session()->flash('alert-message', 'Data Recovered Successfully');
        return to_route('posts.index');
    }
    
    public function getPost(){
        // return DB::table('posts')->where('id', '0')->orWhere('title', 'Excepteur sed')->get();

        // Run raw sql query
        //  return DB::select('select * from posts');
        // return DB::select('select * from posts where title=?', ['Excepteur sed']);

        return DB::select('insert into posts (id, is_active, title, description,is_publish) values(?, ?, ?, ?, ? )', [10, 1, 'Laravel Development', 'I Love Laravel no', 1]);
    }
}
