<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport">
    <title>Create Todo</title>

<style>
    body{
        background-color: rgb(10,20,30);
        color:white;
    }
        .todocontainer
        {
            padding: 3vw 3vw; 
            text-align:center; 
            margin:5vw 15vw;
        }
        h2
        {
            text-transform:uppercase; 
            font-size:35px;
        }
        .inputfield
        {
            padding:20px 30px; 
            font-size:30px;
        }
        .todosubmit
        {
            padding:15px 30px; 
            background-color:white; 
            font-size:30px;
            margin-bottom:30px;
            border-radius:10px;
        }
        .viewtodo
        {
            text-transform:uppercase; 
            font-size:20px; 

            text-decoration:none;
        }
</style>
</head>
<body>
    <div class="todocontainer">
    <h2>Update TODO </h2>
    <div style="background-color:rgb(128, 255, 128,0.5); color:white; font-size:30px; margin-bottom:25px;">{{session()->get('message')}} </div>
    <form action="{{route('todo.update',$todo->id)}}" class="todoform" method="post">
    @csrf
    @method('put')
        <input type="text"  class="inputfield" value="{{$todo->title}}" name="todotext" id="todotext"/>
        <input type="submit" class="todosubmit" style="" value="Update">
        </form>

    <a href="/todos" class="viewtodo">View all todos </a>
    </div>
</body>
</html>