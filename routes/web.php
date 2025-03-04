<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\UserController;

Route::get('/', function () {
    return view('welcome');
});
route::get('/about', function(){
    $name= 'alaa';
    $departments = [
        '1' => 'Technical',
        '2' => 'Financial',
        '3' => 'Sales',
    ];
    return view(view: 'about',data: ['name' => $name , 'departments' => $departments]);
});

route::post('/about', function(){
    $name= $_POST['name'];
    $departments = [
        '1' => 'Technical',
        '2' => 'Financial',
        '3' => 'Sales',
    ];
    return view(view: 'about',data: ['name' => $name , 'departments' => $departments]);
});

Route::get(uri: 'tasks', action: [TaskController::class, 'index']);

Route::post(uri: 'create', action: [TaskController::class, 'create']);

Route::post(uri: 'delete/{id}', action: [TaskController::class, 'destroy']);

Route::post(uri: 'edit/{id}', action: [TaskController::class, 'edit']);

Route::post(uri: 'update', action: [TaskController::class, 'update']);

Route::get(uri: 'users', action: [UserController::class, 'index_user']);

Route::post(uri: 'create_user',  action: [UserController::class, 'create_user']);

Route::post(uri: 'delete_user/{id}', action: [UserController::class, 'destroy_user']);

Route::post(uri: 'edit_user/{id}', action: [UserController::class, 'edit_user']);

Route::post(uri: 'update_user', action: [UserController::class, 'update_user']);

Route::get('app', function(){
    return view('layouts.app');
});
