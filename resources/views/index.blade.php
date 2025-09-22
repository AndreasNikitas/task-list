@extends('layouts.app')

@section('title', 'The list of tasks')

@section('content')
    {{-- @if(count(value: $tasks)) --}}
        @forelse($tasks as $task)
            <div>
                <a href="{{route('task.show', $task->id)}}">{{ $task->title }}</a>
            </div>
        @empty
            <div>No tasks</div>
        @endforelse
    {{-- @endif --}}

@endsection
