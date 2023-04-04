<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use App\Scopes\PostScope;
use Illuminate\Database\Eloquent\Casts\Attribute;
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

    public function user()
    {
        // return $this->belongsTo(Post::class, 'user_id', 'id');
        // return $this->belongsTo(Post::class); // This is laravel convention

        return $this->belongsTo(Post::class); // This is laravel convention
    }

    // Define relationship 
    // public function image()
    // {
    //     return $this->morphOne(Image::class, 'imageable');
    // }

    // public function images()
    // {
    //     return $this->morphMany(Image::class, 'imageable');
    // }

    // public function tags()
    // {
    //     return $this->morphToMany(Tag::class, 'taggable');
    // }


    // Accessor and Mutator

    //    public function getTitleAttribute($v){
    //     return ucfirst($v);
    //    }

    // Accessor laravel 9
    // protected function title(): Attribute
    // {
    //     return Attribute::make(
    //         get: fn ($val) => ucfirst($val)
    //     );
    // }



    // =============== Mutator
    // public function setTitleAttribute($v){
    //     $this->attributes['title'] = strtolower($v);
    // }

    protected function title(): Attribute
    {
        return Attribute::make(
            get: fn ($val) => ucfirst($val),
            set: fn ($val) => strtolower($val)
        );
    }

    public static function booted()
    {
        static::addGlobalScope(new PostScope);
    }


    // public static function booted(){
    //     static::addGlobalScope('active', function(Builder $builder){
    //         $builder->where('is_publish', true);
    //     });
    // }


     

    // image gallery_id relationship define here .

    public function image(){
        return  $this->belongsTo(Gallery::class, 'gallery_id', 'id');
    }

    public function getRouteKeyName(){
        return 'slug';
    }


}
