
@if ($todo->completed)
         <td style="padding-right:15px; color:rgb(20, 255, 12);"> 
               <span onclick="event.preventDefault();
                     document.getElementById('form-incomplete{{$todo->id}}').submit()" 
                     class="fas fa-check"/>  
                     
                        <form action="{{route('todo.incomplete',$todo->id)}}", id="{{'form-incomplete'.$todo->id}}" method="post">
                        @csrf
                        @method('delete')
                        </form>
                        </td>

         @else
         <td style="padding-right:15px; color:white;"> 
                     <span onclick="event.preventDefault();
                           document.getElementById('form-complete{{$todo->id}}').submit()" 
                     class="fas fa-check"/> 
                     
                     <form action="{{route('todo.complete',$todo->id)}}", id="{{'form-complete'.$todo->id}}" method="post">
                        @csrf
                        @method('put')
                     </form>
                     
                     </td>
         @endif
