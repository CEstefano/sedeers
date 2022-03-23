<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    protected $fillable = [
        'cantidad',
        'id_product',
        'id_buyer',
    ];


    // 1 transaccion pertenece a 1 comprador y a un producto
        public function buyer(){
            return $this->belongsTo(Buyer::class);
        }

        public function product(){
            return $this->belongsTo(Product::class);
        }

}


