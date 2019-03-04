<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Buyer;
use App\Product;

class Transaction extends Model
{
    protected $fillable =[
        'quality',
        'buyer_id',
        'product_id',
    ];
    
    
    public function buyer()
    {
        $this->belongsTo('App\Buyer');
    }
    
    public function products()
    {
        $this->belongsTo('App\Product');
    }
}
