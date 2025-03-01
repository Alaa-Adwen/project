<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Task;

class TaskController extends Controller
{
    public function index(){
        //$tasks = DB::table(table: 'tasks')->get();
        $tasks = Task::all();
        return view(view: 'tasks', data: compact(var_name: 'tasks'));
    }

    public function create(){
        $task_name = $_POST['name'];
        //DB::table(table: 'tasks')->insert(values: ['name' => $task_name]);
        $task = new Task;
        $task->name = $task_name;
        $task->save();
        return redirect()->back();
    }

    public function destroy($id){
        //DB::table(table: 'tasks')->where(column: 'id',operator: $id)->delete();
        $task = Task::find($id);
        $task->delete();
        return redirect()->back();
    }

    public function edit($id){
        //$task=DB::table(table: 'tasks')->where(column: 'id',operator: $id)->first();
        //$tasks=DB::table(table: 'tasks')->get();
        $task= Task::find($id);
        $tasks = Task::all();
        return view(view: 'tasks', data: ['task' => $task , 'tasks' => $tasks]);
    }
    public function update(){
        $id = $_POST['id'];
        $task= Task::find($id);
        $task->name = $_POST['name'];
        $task->save();
        //DB::table(table: 'tasks')->where('id','=',$id)->update(['name'=> $_POST['name']]);
        return redirect(to: 'tasks');
    }
}
