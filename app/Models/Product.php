<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = ['product_name', 'description', 'price', 'weight', 
                            'image','create_at','updated_at'];
    
    public function category()
    {
        return $this->belongsToMany(Category::class, 'product_categories');
    }

    public function orderDetails()
    {
        return $this->hasMany(OrderDetail::class);
    }
}
