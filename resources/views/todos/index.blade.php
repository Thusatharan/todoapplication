@extends('layouts.layout')

@section('title_content')
   <title>Todos</title>
@endsection('title_content')

@section('todo_content')
<div class="todocontainer">
    <h2 class="heading">All todos </h2>
    <a href="todos/create" class="create_todobtn"><i class="fas fa-plus"></i></a>
    <div class="sessionmessage">{{session()->get('message')}} </div>

   <div class="list">
   <table>
   @if($todos->count()>0)
    @foreach ($todos as $todo)
    
      <tr>
      @include('todos.complete')
      
      @if($todo->completed)
         <td style="border-left: 6px solid red; text-decoration: line-through; background-color: lightgrey; padding-left:10px; padding-right:15px;"><a href="todos/show/{{$todo->id}}">{{$todo->title}}</a></td> 
      @else
         <td style="border-left: 6px solid red;  background-color: lightgrey; padding-left:10px; padding-right:15px;"><a href="todos/show/{{$todo->id}}">{{$todo->title}}</a></td> 
      @endif
        
         <td><a href="todos/edit/{{$todo->id}}"><button class="editbtn"><i class="fas fa-edit"></i> </button> </a></td>
  
         <td>
         
            <i onclick="event.preventDefault();
                     if(confirm('Are you sure watn to delete')){
                     document.getElementById('form-delete{{$todo->id}}').submit()
                     }"
                     class="fas fa-trash" style="  background:none;
                                                   border:none;
                                                   color:red;
                                                   cursor:pointer;
                                                   border-radius:7px;
                                                   padding: 5px 10px;
                                                   font-size:25px;
                                                   text-align:right;
                                                   margin-left:20px;"></i> 

            <form action="{{route('todo.delete',$todo->id)}}", id="{{'form-delete'.$todo->id}}" method="post">
            @csrf
            @method('delete')
            </form>
         </td>
      </tr>
      @endforeach


      @else
      <p style="color:white;"> There is no task to complete </p>

      @endif
    </table>
  
   </div>
</div>

@endsection