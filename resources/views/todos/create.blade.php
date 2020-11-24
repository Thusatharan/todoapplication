@extends('layouts.layout')

@section('title_content')
   <title>Create Todo</title>
@endsection('title_content')

@section('todo_content')
<div class="todocontainer">
<h2 class="heading">Create Todo</h2>
    <form action="/todos/create" class="todoform" method="post">
    @csrf
    <div style="margin:15px;">
        <input type="text"  class="inputfield" placeholder="Title" name="todotext" id="todotext"/>
    </div>
    <div style="margin:15px;">
        <textarea rows="4" class="textfield" name="descriptionText" id="todotext"></textarea>
    </div>


    <div>
        <input type="submit" class="todosubmit" style="" value="Create">
    </div>    
        </form>

    <a href="/todos" class="viewtodo"><i class="far fa-hand-point-left"></i></a>
</div>
@endsection