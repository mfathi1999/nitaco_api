<?php


use App\Http\Controllers\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });


// public routes
// Route::post('/register',[UserController::class,'store']);
Route::post('/register',[AuthController::class,'register_with_email']);
Route::post('/login',[AuthController::class,'login_with_email']);

// protected routes

Route::middleware(['auth:sanctum'])->group(function () {
    Route::get('/info', function () {
        return "user info";
    });
    Route::post('logout',[AuthController::class,'logout']);
    Route::get('/user/profile', function () {
        // Uses first & second middleware...
    });
});