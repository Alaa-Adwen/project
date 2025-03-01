<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function index_user(){
        //$users = DB::table(table: 'users')->get();
        $users = User::all();
        return view(view: 'users', data: compact(var_name: 'users'));
    }

    public function create_user(){
        $users = [
            'name' => $_POST['User_name'],
            'email' => $_POST['User_email'],
            'password' => $_POST['User_password'],
        ];
       // DB::table(table: 'users')->insert(values: ['name' => $user['name'],'email' => $user['email'], 'password' => $user['password']]);
       $user= new User;
       $user->name =$users['name'];
       $user->email =$users['email'];
       $user->password =$users['password'];
       $user->save();
        return redirect()->back();
    }

    public function destroy_user($id){
        //DB::table(table: 'users')->where(column: 'id',operator: $id)->delete();
        $user= User::find($id);
        $user->delete();
        return redirect()->back();
    }

    public function edit_user($id){
        //$user=DB::table(table: 'users')->where(column: 'id',operator: $id)->first();
        //$users=DB::table(table: 'users')->get();
        $user= User::find($id);
        $users = User::all();
        return view(view: 'users', data: ['user' => $user , 'users' => $users]);
    }

    public function update_user(){
        $id = $_POST['id'];
        //DB::table(table: 'users')->where('id','=',$id)->update(['name'=> $_POST['user_name'],'email'=> $_POST['user_email'],'password'=> $_POST['user_password']]);
        $user= User::find($id);
        $user->name = $_POST['user_name'];
        $user->email =$_POST['user_email'];
        $user->password =$_POST['user_password'];
        $user->save();
        return redirect(to: 'users');
    }
}
