<li>{{ $child_subtask->title }} ( {{ $child_subtask->points }} ) - {{ $child_subtask->id }} - {{ $child_subtask->user_id }}</li>
@if ($child_subtask->subtasks)
    <ul>
        @foreach ($child_subtask->subtasks as $childSubtask)
            @include('child_subtask', ['child_subtask' => $childSubtask])
        @endforeach
    </ul>
@endif