<?php

// namespace
// use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

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


