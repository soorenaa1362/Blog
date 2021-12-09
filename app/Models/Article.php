<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;

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

}
