<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

use App\Models\User;
use App\Models\Category;
use App\Models\Product;
use App\Models\Transaction;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // realizaremos eliminaciones en desorden en cada modelo,
        //x lo que no podemos caer enlas inconsistencias de las claves foraneas, desactivaremos temporalmente
        DB::statement('SET foreign_key_checks = 0');

        User::truncate();
        Category::truncate();
        Transaction::truncate();
        Product::truncate();
        DB::table('category_product')->truncate();

        $cant_Users = 150;
        $cant_Category = 40;
        $cant_Transaction = 1200;
        $cant_Product = 1000;

        User::factory($cant_Users)->create();
        Category::factory($cant_Category)->create();

        // Products , para cada instancia debera ejecutar una funcion donde reciba los productos y
        //la cantidad de categorias x producto , asi luego generaremos dicha asociacion de tabla cruzada
        Product::factory($cant_Product)->create()->each(
            function($producto){
                //para generra la asociacion entre de elemntos de M->M usamos el metodo attach (que recibe la lista de IDS de las categorias en este caso como array)
                //las generaremos en orden aleatorio y de tamaño aleatorio para cada producto

                //1. obtenemos las categorias en aleatorio cantidad que generar como lista, pero con pluck le decimo que queremos solo una lista de ids
                $categorias = Category::all()->random(mt_rand(1,5))->pluck('id');
                //2. Agregar tales categorias al producto
                //$producto->categories = me permite obtener las actegorias asociadas al producto
                //$atach me permite guardar los datos de las categorias en la tabla producto
                $producto->categories()->attach($categorias);
            }
        );

        Transaction::factory($cant_Transaction)->create();


        // \App\Models\User::factory(10)->create();
    }
}
