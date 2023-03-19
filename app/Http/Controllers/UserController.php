<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
   public function index()
   {
    //  return "This user controller";
     return view('user');
    
   }

   public function show($id)
   {
    //  return "This user controller";
     return $id;
    
   }
}
