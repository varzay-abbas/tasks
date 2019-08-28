<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Tasks Manage</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
        <link href="/css/tasks.css"  rel="stylesheet" >

    
    <script>
    
    var _token = '<?php echo csrf_token(); ?>';
    var baseurl = "{{url ('/')}}";
	
    </script>

    
       
    </head>
    <body>
        <div class="flex-center position-ref full-height">
           
            <div class="content">
            
           
            <table id="user_table" class="table table-bordered"  >
               
               @isset($users) 
               <tr> 
                    @foreach($users->data as $user)
                    <th >{{$user->first_name." ".$user->last_name}} ( {{ $user->total_earned_points.'/'. $user->total_points}} )

<div  class="top_new_task_btn" ><a onclick="setUserInfo({{json_encode($user)}}, 0)" data-toggle="modal" data-target="#taskModal" > <i class="fa fa-plus"> </i> </a> 
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
                             @foreach($user->tasks as $task) 
                                <li>{{$task->title}} ( {{$task->points}} ) 
                                    <span   class="sub_task_container"> 
                                      <a onclick="setUserInfo({{json_encode($user)}}, {{$task->id}})" data-toggle="modal" data-target="#taskModal" > <i class="fa fa-plus"> </i> </a> &nbsp;&nbsp;| 
                                      <a onclick="setUserInfo({{json_encode($user)}}, {{$task->id}})" data-toggle="modal" data-target="#taskModal" > <i class="fa fa-pencil"> </i> </a> 
                                    </span>


                              </li>
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




<!-- Modal -->
<div id="taskModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Add Task</h4>
      </div>
      <form method="post" action="/api/task">
      <div class="modal-body">
         
            <input type="hidden" name="user_id" id="user_id"  >
            <input type="hidden" name="parent_id" id="parent_id" >
            <input type="hidden" name="email" id="email" >

            <div class="form-group">
              <label for="title">New Task:</label>
              <input type="text" class="form-control" required pattern="\s*(\S\s*){3,}" name="title" id="title">
              
            </div>

            <div class="form-group">
              <label for="points">Points:</label>              
              <input type="number" min="1" max="10" required class="form-control" name="points" id="points" value="1">
            </div>


        
      </div>
      <div class="modal-footer">
        <input type="submit" class="btn btn-default" value="submit" name="submit" > 
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
      </form>
    </div>

  </div>
</div>


<script src="/js/tasks.js"></script>

    </body>
</html>
