<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Category;
use App\Models\Seller;
use App\Models\Transaction;

class Product extends Model
{
    use HasFactory;

    // Estados solo puede tener 2 valores : Dispo o No dispo
    // Cada q hagamos referencia al estado debemos a travez d ela constante y no a travez del valor especifico
    // Ya que si alguna vez cambia ese valor solo lo cambiamos directamente en el modelo y no e toda parte
    //q la usemos en nuestro cod----- Es decir haremos referencia a las constantes y no a l valor especifico

    const PRODUCTO_DISP = 'disponible';
    const PRODUCTO_NODISP = 'No disponible';

    protected $fillable = [
        'name',
        'description',
        'cantidad',
        'status',
        'image',
        'id_Seller'
    ];

    public function disponible(){
        return $this->status == PRODUCTO_DISP; //retornara true si esta disponible
    }

    //Relacion de muchos a muchos con category
    public function categories()
    {
        return $this->belongsToMany(Category::class, 'category_product', 'id_product','id_category');
    }

    //Relacion de 1 a muchos

    //Un producto esta presente en muchas transacciones  PRODUCT -< tRANSACTIONS

    public function transactions()
    {
        return $this->hasMany(Transaction::class);
    }

    //Un producto Tiene  1 Vendedor (Mdleo Product), en singular la funcion
    //1 vendeddor tiene muchos Productos(hasMany)--Solo valido si lo hacemos en el modelo Seller

    //1 producto pertenece a un 1 vendedor
    public function seller(){
        return $this->belongsTo(Seller::class);
    }


    // BelongTo Un producto solo tiene un vendedor

}
