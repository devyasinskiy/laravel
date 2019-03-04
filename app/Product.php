<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Category;
use App\Seller;
use App\Transaction;

class Product extends Model
{
    const UNAVAILABLE_PRODUCT = 'unavailable';
    const AVAILABLE_PRODUCT = 'available';
    
    protected $fillable=[
        'name',
        'description',
        'quantinty',
        'status',
        'image',
        'seller_id',
    ];
    
    public function isAvailable()
    {
        return $this->status == Product::AVAILABLE_PRODUCT;
    }
    
    public function seller()
    {
        return $this->belongsTo('App\Seller');
    }
    
    public function transaction()
    {
        return $this->hasMany('App\Transaction');
    }
    
    public function categories()
    {
        return $this->belongsToMany('App\Category');
    }
}
