<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Task;

class TasksController extends Controller
{
 
 //getでtasks/にアクセスされた際の「一覧表示」   
public function index()
    {
        $tasks = Task::all();

        return view('tasks.index', [
            'tasks' => $tasks,
        ]);
    }
 
//getでshowにアクセスされた際の「詳細ページ」
public function show($id)
   {
    $task = Task::find($id);
    
    return view('tasks.show',[
            'task' => $task,
        ]);
     }

//GETでtasks/createにアクセスされた際の「新規登録画面の表示」
public function create()
   {
       $task = new task;
       return view('tasks.create',['task' => $task,]);
       }
       
//POSTでtasks/にアクセスされた際の「新規登録処理」
public function store(Request $request)
   {
       $task = new task;
       $task -> content = $request -> content;
       $task -> save();
       
       return redirect('/');
    }

// getでtasks/id/editにアクセスされた際の「更新画面表示処理」
public function edit($id)
   {
       $task = Task::find($id);

        return view('tasks.edit', [
            'task' => $task,
        ]);
      
       $task = Task::find($id);
       return view('tasks.edit',['task' => $task,]);
   }

// putまたはpatchでtask/idにアクセスされた際の「更新処理」
public function update(Request $request,$id)
   {
       $task = Task::find($id);
       $task -> content = $request -> content;
       $task -> save();
       return redirect('/');
       }

  // deleteでtasks/idにアクセスされた際の「削除処理」
public function destroy($id)
   {
       $task = Task::find($id);
       $task -> delete();
       
       return redirect('/');
       }


}