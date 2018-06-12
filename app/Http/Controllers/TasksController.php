<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Task;

class TasksController extends Controller
{
  
   
   public function index()
   {
        $data = [];
        if (\Auth::check()) {
            $user = \Auth::user();
            $tasks = $user->Tasks()->get();
            
          return view('tasks.index', [
              'tasks' => $tasks,
           ]);
        } else {
           return view('welcome');
        }
   }

//getでshowにアクセスされた際の「詳細ページ」
  public function show($id)
  {
        $task = Task::find($id);
    
        if($task->user_id == \Auth::user()->id){
            return view('tasks.show',[
            'task' => $task,
            ]);
        }else{
            return redirect('/');
        }
   }



//GETでtasks/createにアクセスされた際の「新規登録画面の表示」
   public function create()
   {
       $task = new Task;
       return view('tasks.create',['task' => $task,]);
    }
       
       
       
//POSTでtasks/にアクセスされた際の「新規登録処理」
   public function store(Request $request)
   {
       $this -> validate($request,[
           'status' => 'required|max:10',
           'content' => 'required|max:191',
           ]);
     
       $user = \Auth::user();
       $Task = $user->Tasks()->create([
        'status' => $request -> status,
        'content'=> $request -> content,
       ]);
       
       return redirect('/');
    }

// getでtasks/id/editにアクセスされた際の「更新画面表示処理」
    public function edit($id)
   {
     
       $task = Task::find($id);

        return view('tasks.edit', [
            'task' => $task,
        ]);
      

   }

// putまたはpatchでtask/idにアクセスされた際の「更新処理」
   public function update(Request $request,$id)
   {     
       
        $user = \Auth::user();
        $Task = Task::find($id);
        
      
        
        if($Task->user_id == \Auth::user()->id){
            $Task -> status = $request -> status;
            $Task -> content = $request -> content;
            $Task -> save();
            
            return redirect('/');
            
        }else{
            return redirect('/');
        }
    }

 //deleteでtasks/idにアクセスされた際の「削除処理」
    public function destroy($id)
   { 
        $Task = Task::find($id);
        
       
        if($Task->user_id == \Auth::user()->id){
            $Task = Task::find($id);
            $Task -> delete();
            
            return redirect('/');
        }else{
            return redirect('/');
        }
   }
}