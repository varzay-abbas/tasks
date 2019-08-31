<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Tasks Manage</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
       
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
        <link href="/css/tasks.css"  rel="stylesheet" >



    
       
    </head>
    <body>
        <div class="flex-center position-ref full-height">
           
            <div class="content">
            
           
            <table id="user_table" class="table table-bordered"  >
               
               @isset($users) 
               <tr> 
                    @foreach($users->data as $user)
                    <th >{{$user->first_name." ".$user->last_name}} ( {{ $user->total_earned_points.'/'. $user->total_points}} )


                        </div>
                      </th> 
                    @endforeach
                    </tr>
                    <tr> 
                    @foreach($users->data as $user)
                        <td>                          
                          <div class="tasks">

                           @if(count($user->tasks))
                              
                           <ul>
                              @foreach ($user->tasks as $task)
                                  <li> 
                                         
                                      @if($id_undone[$task->id]) (X) @elseif($id_undone[$task->id] == 0) (V) @endif  {{ $task->title }} ( {{ $id_points[$task->id] }} )  
                                    </li>
                                  <ul>
                                  @foreach ($task->childrenSubtasks as $childSubtask)
                                      @include('child_subtask', ['child_subtask' => $childSubtask, 'id_undone' => $id_undone, 'id_points' => $id_points])
                                  @endforeach
                                  </ul>
                              @endforeach
                          </ul>    
                           @endif
                           </div>

                        </td>
                    @endforeach
                    </tr>
                   
               @endisset
               </table>
            </div>
        </div>


<script src="/js/tasks.js"></script>

    </body>
</html>
