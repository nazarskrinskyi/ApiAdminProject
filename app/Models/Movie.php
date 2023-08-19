<?php

namespace App\Models;

use App\Models\Traits\Filterable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    use HasFactory, Filterable;
    protected $guarded = false;


    public function categories()
    {
        return $this->belongsToMany(Category::class,'category_movies','movie_id','category_id');
    }
}
