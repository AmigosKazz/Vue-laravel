<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VisiteurController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get('/visiteur', [VisiteurController::class,'visiteur']);

Route::get('/ajouter', [VisiteurController::class, 'ajouter_visiteur']);

Route::post('/ajouter/traitement', [VisiteurController::class, 'ajouter_visiteur_traitement']);


Route::get('/update/{id}', [VisiteurController::class, 'update_visiteur']);

Route::post('/update/traitement', [VisiteurController::class, 'update_visiteur_traitement']);

Route::get('/delete/{id}', [VisiteurController::class, 'delete_visiteur']);


Route::get('/somme', [VisiteurController::class, 'somme']);
Route::get('/min', [VisiteurController::class, 'minim']);
Route::get('/max', [VisiteurController::class, 'maxim']);
