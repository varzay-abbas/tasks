<li>
<!--{{ $child_subtask->title }} ( {{ $child_subtask->points }} ) -id: {{ $child_subtask->id }}
!-->
@if($id_undone[$child_subtask->id]) (X) @elseif($id_undone[$child_subtask->id] == 0) (V) @endif  {{ $child_subtask->title }} ( {{ $id_points[$child_subtask->id] }} ) - id: {{ $child_subtask->id }}  

</li>
@if ($child_subtask->subtasks)
    <ul>
        @foreach ($child_subtask->subtasks as $childSubtask)
            @include('child_subtask', ['child_subtask' => $childSubtask , 'id_undone' => $id_undone, 'id_points' => $id_points])
        @endforeach
    </ul>
@endif