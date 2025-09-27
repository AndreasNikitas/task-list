@extends('layouts.app')

@section('title', 'Add Task')

@section('content')
<form method="POST" action="{{route('task.store')}}">
@csrf
</form>

@endsection


