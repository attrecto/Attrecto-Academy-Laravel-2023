<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;

class Course extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'url',
        'author_id'
    ];

    public function TitleWithAuthor():Attribute {
        return new Attribute(
            get: fn($value) => $this->author ? $this->title . '/' . $this->author->name : 'Ismeretlen',
            set: fn($value) => $value
        );
    }

    public function author(){
        return $this->hasOne(User::class,'id','author_id');
    }
}
