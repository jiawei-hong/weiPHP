<?php
    include('../route.php');

    use App\Controllers\MainController;

    Route::get('/', [MainController::class, 'home']);
    Route::get('/user/{id}', [MainController::class, 'index']);
    Route::get('/users/{id}', [MainController::class, 'index']);
