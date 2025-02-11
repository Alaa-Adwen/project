<?php

use Illuminate\Support\Facades\Route;

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

