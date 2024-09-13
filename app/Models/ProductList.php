<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductList extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description', 'price', 'product_type_id', 'image_path'];

    public function productType()
    {
        return $this->belongsTo(ProductType::class);
    }
}
