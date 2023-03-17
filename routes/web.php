<?php

// namespace
// use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Route;

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
Route::get('/', function(){
     return View::make('greeting', ['do' => 'James']);
});
