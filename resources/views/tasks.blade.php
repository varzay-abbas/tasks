@extends('layouts.app')
@section('content')


        <div class="flex-center position-ref full-height">
           
            <div class="content">
            
            <h3 class="header_title"> Task Management System </h3>
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

        @endsection
