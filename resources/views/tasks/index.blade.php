@extends('layouts.app')

@section('content')

    <div class="text-center">
        <div class="well well-lg">
            <h1>タスク一覧</h1>
        </div>

    @if (count($tasks) > 0)
        <ul>
         <table class="table table-striped">
           　<tr><th>ID</th><th>status</th><th>content</th></tr>
            @foreach ($tasks as $task)
                    <tr><td>>{!! link_to_route('tasks.show',$task->id,['id'=>$task->id])!!}</td><td>{{$task->status}}</td><td>{{$task->content}}</td></tr>
            @endforeach
        </table>
        </ul>
    @endif
    
    {!! link_to_route('tasks.create','新規登録') !!}
    </div>
@endsection

