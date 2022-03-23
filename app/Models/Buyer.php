<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Transaction;

class Buyer extends User
{
    use HasFactory;

    //Un comprador pueder hacer muchas transacciones
    // El nombre de la funcion  sera el nombre de la relacion como tal

    public function transactions(){

        return $this->hasMany(Transaction::class);
        //atributo ::class accedemos al nombre d ela clase junto a sus namespace
    }
}
