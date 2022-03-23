<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

use Illuminate\Support\Str;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    //En users especificamos el nombre d ela tabla para que lo herede   (Buyer y Seller),
    //ASI NO NOS DARA PROBLEMAS AL MOENTO DE SEEDERS , pues buscara con nombre d etabla users en ves de buyer o Seller que no existen.

    protected $table = 'users';

    // 1.Medtodo para saber si esta verificado
    const USER_VERIFICADO = '1';
    const USER_NO_VERIFICADO = '0';

    // 2. CASO DE SER ADMIN metodo

    const USER_ADMIN = 'true';
    const USER_REGULAR = 'false';

    // 3. Metodo para generar automaticamente a partir del Modelo el TOKEN_VERIFIED

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */

    protected $fillable = [
        'name',
        'email',
        'password',
        'verified', //verificar su coorreo electronico a travez de cod
        'verified_token',
        'admin' // verificar si es admin
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */

     //  Los atributos que se pongan aqui seran ocultados en la respuesta JSON
     //Laravel cuando va usar un modelocomo respuesta lo conviete en array y lo devuelve como JSON
    protected $hidden = [
        'password',
        'remember_token', //recordar si el user debe permanecer con la sesion activa o no
        'verified_token' //nadie , incluive el admin tendra acceso al token de un user para luego validarlod e forma incorrecta , puesto que esta validaccionse hace desde el correo
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    // protected $casts = [
    //     'email_verified_at' => 'datetime',
    // ];


    public function esVerificado(){
        return $this->verified == User::USER_VERIFICADO;
    }


    public function esAdmin(){
        return $this->admin == User::USER_ADMIN;
    }

 //Estatico puesto que no requerimos de una instancia de user para poder generar el token
    public static function generarVerifiedToken(){
        return Str::random(40);
    }


}
