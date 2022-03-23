<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

use App\Models\User;

class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        static $password;
        return [
            'name' => $this->faker->name(),
            'email' => $this->faker->unique()->safeEmail(),
            // 'email_verified_at' => now(),
            'password' => $password ?: $password= bcrypt('secret'), // si no se envia un password al factory para tdos va ser secret
            'remember_token' => Str::random(10),
            'verified' => $verificado = $this->faker->randomElement([User::USER_VERIFICADO , User::USER_NO_VERIFICADO ]),
            'verified_token'=>$verificado == User::USER_VERIFICADO ? null : User::generarVerifiedToken(),
            'verified' => $this->faker->randomElement([User::USER_ADMIN , User::USER_REGULAR ]),
            // El token de verificacion solo debe crearse unicamente si el user es verificado o no
            //Si es verificado no, si no es verificado deberia tener un token de verificacion que s edeba usar al momento de verificar la cuenta
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    // public function unverified()
    // {
    //     return $this->state(function (array $attributes) {
    //         return [
    //             'email_verified_at' => null,
    //         ];
    //     });
    // }
}
