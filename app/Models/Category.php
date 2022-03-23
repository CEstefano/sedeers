<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Product;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'descripcion'
    ];

    //RELACION DE MUCHOS A MUCHOS CON PRODUCTO

    public function products()
    {
        return $this->belongsToMany(Product::class,'category_product','id_category','id_product');
    }
}
