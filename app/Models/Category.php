<?php

namespace App\Models;


use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
    use HasFactory;
    use sluggable;

    protected $table = "categories";

    protected $fillable = [
        'title',
        'slug',
        'active',
    ];


    public function Articles()
    {
        return $this->belongsToMany(Article::class);
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
