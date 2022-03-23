<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

use App\Models\User;
use App\Models\Seller;
use App\Models\Product;

use App\Models\Transaction;

class TransactionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        //con ramdom() obtenemos la instancia de un Seller , si pusieramos ramdom(1  o 2 ...) obtendriamos una coleccion
        //Un vendedror es aquel usuario que ya posee productos , obtenemos todos los usuarios que ya poseen (has) productos y ramdom 1 soloal final que sera el vendedor
        $vendedor = Seller::has('product')->get()->random();
        //dentro de ramdom podemos especificar que cantidad queremos de get en este caso 1 tal comoe sta
        $comprador = User::all()->except($vendedor->id)->random();

        return [
            'cantidad' => $this->faker->numberBetween(1,3),
            'id_buyer' => $comprador->id,
            'id_product' => $vendedor->product->random()->id,

            //Un producto tendria que ser comprado por un usuario buyer , diferente a un Usuario Seller en el id.
        ];
    }
}
