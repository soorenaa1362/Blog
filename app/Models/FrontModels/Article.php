<?php

namespace App\Models\FrontModels;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Article extends Model
{
    use HasFactory;
    use Sluggable;

    protected $table = "articles";

    protected $fillable = [
        'title', 
        'text',
        'slug',
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


    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => ''
            ]
        ];
    }


}
