<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

use App\Models\Product;
use App\Models\User;

class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->word(), //genera palabras
            'description' => $this->faker->paragraph(1), //genera parafos
            'cantidad' => $this->faker->numberBetween(1,10),
            'status' => $this->faker->randomElement([Product::PRODUCTO_DISP, Product::PRODUCTO_NODISP]),
            'image' => $this->faker->randomElement([ '1.jpg' , '2.jpg' , '3.jpg' , '4.jpg']),

            //2 fomras de obtener el id para rellenar datos correctamente
                // 'id_Seller' => User::inRandomOrden()->firts()->id,
            'id_Seller' => User::all()->random()->id

        ];
    }
}
