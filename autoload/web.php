<?php
    include('../Route.php');

    use App\Controllers\MainController;

    Route::get('/user/{id}', [MainController::class, 'index']);
    Route::get('/users/{id}', [MainController::class, 'index']);
