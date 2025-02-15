<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;

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

Route::get(uri: 'tasks', action: function(){
    return view(view: 'tasks');
});

Route::post(uri: 'create', action: function(){
    $task_name = $_POST['name'];
    DB::table(table: 'tasks')->insert(values: ['name' => $task_name]);
    return view(view: 'tasks');
});

