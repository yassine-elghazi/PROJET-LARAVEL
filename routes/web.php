<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\EmployeController;
use App\Http\Controllers\UserController;

Route::get('/', function () {
    return view('welcome');
});

Route::get("/home", [UserController::class, 'index']);
Route::get("/search", [UserController::class, 'search']);

Route::get('/delete-employee/{id}', [EmployeController::class, 'delete_employe']);
Route::get('/update-employee/{id}', [EmployeController::class, 'update_employe']);
Route::post('/update/traitement', [EmployeController::class, 'update_employe_traitement']);
Route::get('/Employe', [EmployeController::class, 'liste_employe']);
Route::get('/ajouter', [EmployeController::class, 'ajouter_employe']);
Route::post('/ajouter/traitement', [EmployeController::class, 'ajouter_employe_traitement']);


Route::get('/', function () {
    return view('login');
});

Route::group(['middleware' => 'guest'], function () {
    Route::get('/register', [AuthController::class, 'register'])->name('register');
    Route::post('/register', [AuthController::class, 'registerPost'])->name('register');
    Route::get('/login', [AuthController::class, 'login'])->name('login');
    Route::post('/login', [AuthController::class, 'loginPost'])->name('login');
});

Route::group(['middleware' => 'auth'], function () {
    Route::get('/home', [EmployeController::class, 'liste_employe']);
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});


Route::get('/search', [EmployeController::class, 'search'])->name('search');
