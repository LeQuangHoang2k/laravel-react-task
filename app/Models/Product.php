<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable=[
        "ProductID",
        "ProductCategory",
        "ProductName",
        "ProductPictureURL",
        "ProductDescription",
        "PriceDefault",
        "ProductPriority"
    ];

    public function options()
    {
        return $this->hasMany(ProductOption::class, 'ProductID');
    }

    public function imagegs()
    {
        return $this->hasMany(ProductOption::class, 'ProductID');
    }
}
