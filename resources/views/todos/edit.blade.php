@extends('layouts.layout')

@section('title_content')
   <title>Edit Todo</title>
@endsection('title_content')

@section('todo_content')
    <div class="todocontainer">
    <h2 class="heading">Edit Todo</h2>
    <div style="background-color:rgb(128, 255, 128,0.5); color:white; font-size:30px; margin-bottom:25px;">{{session()->get('message')}} </div>
    <form action="{{route('todo.update',$todo->id)}}" class="todoform" method="post">
    @csrf
    @method('put')
    <div style="margin:15px;">
        <input type="text"  class="inputfield" value="{{$todo->title}}" name="todotext" id="todotext"/>
    </div>

    <div style="margin:15px;">
        <textarea rows="4" class="textfield" name="descriptionText" id="todotext">{{$todo->description}} </textarea>
    </div>

        <input type="submit" class="todosubmit" style="" value="Update">
        </form>

        <a href="/todos" class="viewtodo"><i class="far fa-hand-point-left"></i></a>
    </div>
@endsection