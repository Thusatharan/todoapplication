<!DOCTYPE html>
<html lang="en">
<head>

   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Document</title>
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css"/>
 <style>
   body
   {
      background-color:rgb(20,52,60);
   }

   .todocontainer
   {
      padding: 2vw 3vw;
      text-align:center; 
      margin:2vw 23vw; 
      background-color: rgb(255,225,225,0.4);
      border-radius:25px;
   }
   .heading
   {
      text-transform:uppercase; 
      font-size:35px; 
      color:rgb(220,200,50);
      display:flex; 
      justify-content:center;
   }

   .create_todobtn 
   {
      background-color: rgb(60,165,200,0.8); /* Green */
      border: none;
      color:white;
      padding: 5px 10px;
      text-align: center;
      text-decoration: none;
      display: inline-block;
      font-size: 30px;
      border-radius:15px 15px 15px 15px;
      margin-bottom:15px;
      }
      .list
      {
         font-size:25px;
         text-align:left;
         /* margin-left:15vw; */
         display:flex;
         justify-content:center;
      }
      .editbtn
      {
         background:none;
         border:none;
         color:rgb(255,165,60);
         cursor:pointer;
         border-radius:7px;
         padding: 5px 10px;
         font-size:25px;
         text-align:right;
         margin-left:40px;
      }
      .dltbtn
      {
         background:none;
         border:none;
         color:red;
         cursor:pointer;
         border-radius:7px;
         padding: 5px 10px;
         font-size:25px;
         text-align:right;
         margin-left:20px;
      }

      .sessionmessage
      {
         background-color:rgb(120,200,50); 
         color:white; 
         font-size:30px; 
         margin-bottom:25px; 
         border-radius:5px;
      }
   }
 </style>
 
</head>
<body>
<div class="todocontainer">
    <h2 class="heading">All todos </h2>
    <a href="todos/create" class="create_todobtn"><i class="fas fa-plus"></i></a>
    <div class="sessionmessage">{{session()->get('message')}} </div>

   <div class="list">
   <table>
    @foreach ($todos as $todo)
    
      <tr>
      @include('todos.complete')
      
      @if($todo->completed)
         <td style="border-left: 6px solid red; text-decoration: line-through; background-color: lightgrey; padding-left:10px; padding-right:15px;">{{$todo->title}} </td> 
      @else
         <td style="border-left: 6px solid red;  background-color: lightgrey; padding-left:10px; padding-right:15px;">{{$todo->title}} </td> 
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
    </table>
  
   </div>
</div>

</body>
</html>

