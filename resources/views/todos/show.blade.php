@extends('layouts.layout')

@section('title_content')
   <title>Create Todo</title>
@endsection('title_content')

@section('todo_content')
<div class="todocontainer">
<h2 class="heading"> {{$todos->title}}</h2>
  
    <div class="showDescription">
    {{$todos->description}}
</div>
    <a href="/todos" class="viewtodo"><i class="far fa-hand-point-left"></i></a>
</div>
@endsection