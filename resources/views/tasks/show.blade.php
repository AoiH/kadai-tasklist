@extends('layouts.app')

@section('content')


<div class="text-center">
    <div class="well well-lg">
        <h1>id = {{$task -> id}}のタスク詳細</h1>
    </div>
      <table class="table table-striped">
          <tr><th>ID</th><th>status</th><th>content</th></tr>  
          <tr><td>>{!! link_to_route('tasks.show',$task->id,['id'=>$task->id])!!}</td><td>{{$task->status}}</td><td>{{$task->content}}</td></tr>
      </table>

 {!! link_to_route('tasks.edit','編集',['id'=>$task->id]) !!}
 

 {!! Form::model($task,['route'=> ['tasks.destroy', $task->id], 'method' => 'delete']) !!}
    {!! Form::submit('削除')!!}
 {!! Form::close() !!}
     
</div>     
@endsection


