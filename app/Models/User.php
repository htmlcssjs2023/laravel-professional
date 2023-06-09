<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    // public function post(){
    //     // return $this->hasOne(Post::class,'user_id', 'id');

    //     // return $this->hasOne(Post::class); //  Laravel convention

    //     return $this->hasOne(Post::class);
    // }


    public function post(){
        return $this->hasOne(Post::class)->withDefault(['key', 'Laravel Post']);
    }

    public function posts(){
        return $this->hasMany(Post::class)->where('title', 'Ab itaque');
    }

    public function postComment(){
        return $this->hasOneThrough(Comment::class, Post::class);
    }

    public function postComments(){
        return $this->hasManyThrough(Comment::class, Post::class);
    }
    // Monay to Many
    public function roles(){
        return $this->belongsToMany(Role::class);
    }

    // define relationship

    public function image(){
        return $this->morphOne(Image::class, 'imageable')->latestOfMany();
        ;
    }

    // many to many polymorphic
    public function images(){
        return $this->morphMany(Image::class, 'imageable');
    }
}


