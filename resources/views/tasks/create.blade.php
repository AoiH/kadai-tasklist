@extends('layouts.app')

@section('content')

   <h1>新規登録ページ</h1>
  
   
   
      {!! Form::model($task,['route' => 'tasks.store']) !!}
      
         {!! Form::label('status','ステータス:') !!}
         {!! Form::text('status') !!}
         
         {!! Form::label('content','タスク:') !!}
         
         {!! Form::text('content') !!}
         
         {!! Form::submit('登録') !!}
      
      {!! Form::close() !!}

@endsection