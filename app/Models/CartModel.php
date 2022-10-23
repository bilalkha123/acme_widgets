<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\ProductModel;

class CartModel extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'products','user', 'price', 'code','status'
    ];

/*    public function products($value='')
    
    {
        return $this->hasMany(ProductModel::class, 'code');
    }*/
}




