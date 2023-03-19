<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    // use HasFactory;
    // manually add model 
    // protected $table = ['users'];

    // protected $fillable = [ 'is_halim','title','description', 'is_publish'];
    protected $guarded = [];

}
