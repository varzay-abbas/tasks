<ul>
    @foreach ($tasks as $task)
        <li>{{ $task->title }} - {{ $task->id }} - {{ $task->user_id }} </li>
        <ul>
        @foreach ($task->childrenSubtasks as $childSubtask)
            @include('child_subtask', ['child_subtask' => $childSubtask])
        @endforeach
        </ul>
    @endforeach
</ul>