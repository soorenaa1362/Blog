<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Expert extends Model
{
    use HasFactory;

    protected $table = "experts";

    protected $guarded = [];

    public function subset()
    {
        return $this->hasMany('App\Models\Expert', 'expert_id');
    }
}
