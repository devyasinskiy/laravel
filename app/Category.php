<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Product;

class Category extends Model
{
    protected $fillable = [
        'name',
        'descrition',
    ];
    
    public function products()
    {
        return $this->belongsToMany('App\Product');
    }
}
