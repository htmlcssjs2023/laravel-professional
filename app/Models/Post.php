<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use HasFactory, SoftDeletes;
    // manually add model 
    // protected $table = ['users'];

    // protected $fillable = [
    //      'is_halim',
    //      'user_id',
    //      'title',
    //      'description',
    //      'is_publish',
    //      'deleted_at'
        
    // ];
    protected $guarded = [];

    public function user(){
        // return $this->belongsTo(Post::class, 'user_id', 'id');
        // return $this->belongsTo(Post::class); // This is laravel convention

        return $this->belongsTo(Post::class); // This is laravel convention
    }

    // Define relationship 
    public function image(){
        return $this->morphOne(Image::class, 'imageable');
    }

    public function images(){
        return $this->morphMany(Image::class, 'imageable');
    }

    public function tags(){
        return $this->morphToMany(Tag::class, 'taggable');
    }

   
}
