<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\StorageController;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\TournamentController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

//Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//    return $request->user();
//});

// Регистрация
Route::post('/register', [AuthController::class, 'signUp']);
// Вход
Route::post('/login', [AuthController::class, 'login']);

Route::middleware('auth:api')->group(function () {
    //Выход
    Route::get('/logout', [AuthController::class, 'logout']);

    // Создание команды
    Route::post('/teams', [TeamController::class, 'addTeam']);

    // Регистрация команды на турнир
    Route::post('/tournaments/{id}/teams', [TeamController::class, 'addTeam']);

    // Список турниров
    Route::get('/tournaments', [TournamentController::class, 'tourList']);

    // Список участников турнира
    Route::get('/tournaments/{id}/teams', [TournamentController::class, 'teamMembers']);

    // Список матчей в турнире
    Route::get('/tournaments/{id}/matches', [TournamentController::class, 'matchesList']);

    // Загрузка логотипа команды на сервер
    Route::post('/images/logo', [StorageController::class, 'addTeamLogo']);

    // Загрузка фотографии игрока на сервер
    Route::post('/images/photo', [StorageController::class, 'addPlayerPhoto']);
});
