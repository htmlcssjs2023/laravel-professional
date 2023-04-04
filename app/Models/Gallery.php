<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use PhpParser\Node\Attribute as NodeAttribute;

class Gallery extends Model
{
    use HasFactory;
    public const Type = 1;
    protected $guarded = [];


    // upload image  path using accessror
    public $uploadImage = '/storage/assets/posts/images/';

    protected function name():Attribute
    {
        return Attribute::make(
            get:fn($value) => $this->uploadImage.$value
        );
    }
}
