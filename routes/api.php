<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\User\UserController;
use App\Http\Controllers\Buyer\BuyerController;
use App\Http\Controllers\Category\CategoryController;
use App\Http\Controllers\Product\ProductController;
use App\Http\Controllers\Seller\SellerController;
use App\Http\Controllers\Transaction\TransactionController;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


/*ESTO QUIERE DECIR QUE SI INTENTAMOS ACCEDER A LA RUTA USER de la api COMO TAL tendriamos que estar autorizados x medio de un token para accedr

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
}); */


//Route::resource('user', UserController::class);

Route::resource('users', UserController::class , ['except' => ['create', 'edit' ]]);

Route::resource('buyers' , BuyerController::class , ['only' => ['index', 'show' ]]);

Route::resource('sellers' , SellerController::class , ['only' => ['index', 'show' ]]);

Route::resource('categorys' , CategoryController::class, ['except' => ['create', 'edit' ]]);

Route::resource('products' , ProductController::class , ['only' => ['index', 'show' ]]);

Route::resource('transactions' , TransactionController::class , ['only' => ['index', 'show' ]]);




 //al controller le paso la propiedad class o puedo usar 'User/UserController'

