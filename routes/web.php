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
    $tasks = DB::table(table: 'tasks')->get();
    return view(view: 'tasks', data: compact(var_name: 'tasks'));
});

Route::post(uri: 'create', action: function(){
    $task_name = $_POST['name'];
    DB::table(table: 'tasks')->insert(values: ['name' => $task_name]);
    return redirect()->back();
});

Route::post(uri: 'delete/{id}', action: function($id){
    DB::table(table: 'tasks')->where(column: 'id',operator: $id)->delete();
    return redirect()->back();
});

Route::post(uri: 'edit/{id}', action: function($id){
    $task=DB::table(table: 'tasks')->where(column: 'id',operator: $id)->first();
    $tasks=DB::table(table: 'tasks')->get();
    return view(view: 'tasks', data: ['task' => $task , 'tasks' => $tasks]);
});

Route::post(uri: 'update', action: function(){
    $id = $_POST['id'];
    DB::table(table: 'tasks')->where('id','=',$id)->update(['name'=> $_POST['name']]);
    return redirect(to: 'tasks');
});

Route::get(uri: 'users', action: function(){
    $users = DB::table(table: 'users')->get();
    return view(view: 'users', data: compact(var_name: 'users'));
});

Route::post(uri: 'create_user', action: function(){
    $user = [
        'name' => $_POST['User_name'],
        'email' => $_POST['User_email'],
        'password' => $_POST['User_password'],
    ];
    DB::table(table: 'users')->insert(values: ['name' => $user['name'],'email' => $user['email'], 'password' => $user['password']]);
    return redirect()->back();
});

Route::post(uri: 'delete_user/{id}', action: function($id){
    DB::table(table: 'users')->where(column: 'id',operator: $id)->delete();
    return redirect()->back();
});

Route::post(uri: 'edit/{id}', action: function($id){
    $task=DB::table(table: 'tasks')->where(column: 'id',operator: $id)->first();
    $tasks=DB::table(table: 'tasks')->get();
    return view(view: 'tasks', data: ['task' => $task , 'tasks' => $tasks]);
});

Route::post(uri: 'edit_user/{id}', action: function($id){
    $user=DB::table(table: 'users')->where(column: 'id',operator: $id)->first();
    $users=DB::table(table: 'users')->get();
    return view(view: 'users', data: ['user' => $user , 'users' => $users]);
});

Route::post(uri: 'update_user', action: function(){
    $id = $_POST['id'];
    DB::table(table: 'users')->where('id','=',$id)->update(['name'=> $_POST['user_name'],'email'=> $_POST['user_email'],'password'=> $_POST['user_password']]);
    return redirect(to: 'users');
});

