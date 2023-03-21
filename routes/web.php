<?php

// namespace
// use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });
use App\Models\Post;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;

use function GuzzleHttp\Promise\all;

// ==================================================================
// create route without parameter
// Route::get('/hello', function(){
//     return "Hello Abdul Halim";
// });

// =================== parameterize route
// Route::get('/greeting/{id}', function($id){
//     return "Parameter is :  $id";
// });


// optional parameter ===================
//name? is  optional parameter 

// Route::get('/optional/{name?}',function(){
//     return "This is optional parameter";
// });

// Constraint rout

// Route::get('root/{name}', function($name){
//     return "This is constraint";
// })->where('name', '[a-z]+');

// multiple parameter constraint

// Route::get('root/{name}/{id}',function($name,$id){
//     return "Constraints";
// })->where(['name' => '[a-z]+', 'id' => '[0-9]']);


// Route::get('root/{name}/{id}',function(){
//     return "Hell0";
// })->where(['name'=> '[a-z]+', 'id' => '[0-9]']);


// ============================================== Redirect to form one router to another
// Route::get('/', function(){
//     return "Home";
// });

// Route::redirect('/', 'login'); // home directory

// Route::get('login', function(){
//     return "login";
// });

// =================================== Redirect from one route to another route using href;

// Route::get('/', function(){
//     return "<a href ='About'>About</a>";
// });

// Route::get('About', function(){
//     return "This is about route";
// });


// ================================ Show views using route

// Route::get('greeting', function(){
//     return view('greeting');
// });

// ================================ Show views using Route:view('route_name', 'views_name') method, 
// Route::view('love', 'greeting');

// Route::view('do', 'welcome');


// Route::get('wel', function(){
//     return view('welcome');
// });

//=============== pass variable throuh blade.php 

// Route::get('love', function(){
//     // return view('greeting', ['name' => 'Abdul Halim']);
//     // return view('greeting', ['name' => 'Abdul Halim', 'age' => 27]);

//     $name = 'Asraf';
//     return view('greeting', compact('name'));
// });

//=== with('key', value); 
// Route::get('love', function(){
//     $name = 'Asraf';
//     return view('greeting')
//     ->with('do', $name);
// });


//============= using helper of View class
// Route::get('/', function(){
//      return View::make('greeting', ['do' => 'James']);
// });


//================== Nested Development
// Route::get('/',function(){
//      return view('admin.hello');
// });

// =========================  Route:view('views_name','template_name');

// Route::view('/','test');
// Route::view('/post','post');
// Route::view('/user','user');
// Route::view('/test','test');


//===================== Controller pass using route;

// Route::get('users/', [UserController::class, 'index']);
// Route::get('users/show/{id}', [UserController::class, 'show']);


// Route::get('posts', [PostController::class, 'index']);

// Route::get('posts', PostController::class);


//  ============= Check database isConnect with App
// Route::get('connect', function(){
//     try{
//         DB::connection()->getPdo();
//         return "Connect Successfully";
//     }
//     catch(\PDOException $e){
//         echo $e->getMessage();
//     }
// });

// Route::get('test', function () {
    // Insert data into DB;

    // Post::create([
    //     'is_halim' => false,
    //     'title' => 'Laravel 9.0',
    //     'description' => 'This is laravel 8',
    //     'is_publish' => false
    // ]);

    // return "Successfully Inserted";

    // Get Data from DB

    // $getData = Post::all();
    // $getData = Post::find(1); // it return index wise value
    // $getData = Post::findOrFail(2); // it return idex wise value and show error if not find data;

    // $getData = Post::find(0);
    // if(!$getData){
    //     return "Not Found";
    // }
    //  $getData = Post::where('title', 'Laravel 9.0')->get();
    //  $getData = Post::where('title', 'Laravel 9.0')->get();
    //  $getData = Post::where('title', 'Laravel 9.0')->where('description','This is laravel 8')->get();
    //  $getData = Post::where(['title' => 'Laravel 9.0', 'description' => 'This is laravel 8'])->get();
    //  $getData = Post::where(['title' => 'Laravel 9.0', 'description' => 'This is laravel 8'])->get();

    // return $getData;
        // ============================================= Update data from table;
    // $post = Post::find(3);
    // $post->update([
    //     'title' => 'Laravel 9.1.5'
    // ]);
    
    // return "Updated Successfully";

    // ======================================== Delete Data From the table;

    // $post = Post::find(1);

    // if(! $post){
    //     return "Not Found";
    // }
    // else{
    //     $post->delete();
    //     echo "Deleted Successfully";
    // }
  
// });

// Route::get('get', [PostController::class, 'index']);
// Route::get('store', [PostController::class, 'store']);
// Route::get('update', [PostController::class, 'update']);
// Route::get('delete', [PostController::class, 'destroy']);

    
// Route::get('/test-01', function(){
//     return "test-01";
// })->name('test.1');

// Route::get('/test-02', function(){
//     return "test-02";
// })->name('test.2');


Route::resource('posts', PostController::class);

//Kemon achen ! How are you? Islam 

Route::get('/test', function(Request $request){
    // return "This is test route ";

    // Session::put('login', 'You are login'); // create session
    // Session::flash('login', 'You are login'); // create session

    // Session::forget('login'); // forget session
    //========================== How to forget multiple Session
    // Session::flush();// Thi is method destroy multiple session

    // if(Session::has('login')){ // Check session
    //     return "Set Session";
    // }
    // else{
    //     return "Session is not set";
    // }

});


