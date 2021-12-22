<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Article extends Model
{
    use HasFactory;
    use sluggable;

    protected $table = "articles";

    protected $fillable = [
        'title', 
        'slug',
        'text',
        'status',
        'user_id'
    ];

    protected $attributes = [
        'hit' => 1,
    ];


    public function User()
    {
        return $this->belongsTo(User::class);
    }


    public function Categories()
    {
        return $this->belongsToMany(Category::class);
    }


    public function Comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }
    


}
