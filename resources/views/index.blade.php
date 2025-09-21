<h1>
The list of tasks
</h1>


<div>
    {{-- @if(count(value: $tasks)) --}}
        @forelse($tasks as $task)
            <div>
                <a href="{{route('task.show', $task->id)}}">{{ $task->title }}</a> 
            </div>
        @empty
            <div>No tasks</div>
        @endforelse
    {{-- @endif --}}
</div>
