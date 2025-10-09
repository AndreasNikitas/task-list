@extends('layouts.app')

@section('title', $task->title)

@section('content')

<p>{{ $task->description }}</p>
@if($task->long_description)
    <p>{{ $task->long_description }}</p>
@endif

<p>{{ $task->created_at }}</p>
<p>{{ $task->updated_at }}</p>

<p>Status: {{ $task->is_completed ? 'Completed' : 'Incompleted' }}</p>

<div>
    <a href="{{ route('task.edit', ['task' => $task]) }}">Edit</a>
</div>

<div>
    <form action="{{ route('task.toggle-complete', ['task' => $task]) }}" method="POST">
        @csrf
        @method('PUT')
        <button type="submit">
            Mark as {{ $task->is_completed ? 'Incompleted' : 'Completed' }}
        </button>
    </form>
</div>

<div>
    <form action="{{ route('task.destroy', ['task' => $task]) }}" method="POST">
        @csrf
        @method('DELETE')
        <button type="submit">Delete Task</button>
    </form>
</div>

@endsection
