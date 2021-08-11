<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory,Sluggable;

    protected $table = 'posts';

    protected $fillable = [
        'author_id',
        'slug',
        'title',
        'text'
    ];

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

    public function author(){
        return $this->hasOne(Author::class,'id','author_id');
    }
    public function comments(){
        return $this->hasMany(PostComment::class,'post_id','id')->orderBy('id','desc');
    }
}
