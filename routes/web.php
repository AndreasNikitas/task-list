<?php

// use GuzzleHttp\Psr7\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Response;

use Illuminate\Http\Request;
use App\Models\Task;

use App\Http\Requests\TaskRequest;




Route::get('/', function () {
    return redirect()->route('task.index');
});


Route::get('/tasks', function ()  {
    return view('index', [
       'tasks' => Task::latest()->get()
    ]);
}) ->name('task.index');



Route::view('/tasks/create', 'create')
    ->name('task.create');


Route::get('/tasks/{task}/edit', function (Task $task)  {
    return view('edit',[
        'task' => $task
    ]);
})  ->name('task.edit');



Route::get('/tasks/{task}', function (Task $task)  {
    return view('show',[
        'task' => $task
    ]);
})  ->name('task.show');


Route::post('/tasks', function(TaskRequest $request) {

    // $data=;
    // $task=new Task();
    // $task->title=$data['title'];
    // $task->description=$data['description'];
    // $task->long_description=$data['long_description'];
    // $task->save();

    $task = Task::create($request->validated());

    return redirect()->route('task.show', ['task' => $task->id])
    ->with('success', 'Task created successfully');

}) ->name('task.store');



Route::put('/tasks/{task}', function(TaskRequest $request, Task $task) {

    // $data=;
    // $task->title=$data['title'];
    // $task->description=$data['description'];
    // $task->long_description=$data['long_description'];
    // $task->save();

$task->update($request->validated());

    return redirect()->route('task.show', ['task' => $task->id])
    ->with('success', 'Task updated successfully');

}) ->name('task.update');


// Route::get('/halo',function () {
//     return redirect()->route('hello');
// });

// Route::get('/hello', function () {
//     return 'Hello';
// })->name('hello');

// Route::get('/greet/{name}', function ($name) {
//     return 'Hello ' . $name;
// });

Route::fallback(function () {
    return 'Page not found';
});

