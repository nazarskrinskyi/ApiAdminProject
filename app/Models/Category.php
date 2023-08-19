<?php

namespace App\Models;

use App\Models\Traits\Filterable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory, Filterable;
    protected $guarded = false;


    public function movies()
    {
        return $this->belongsToMany(Movie::class,'category_movies','category_id','movie_id');
    }
}
