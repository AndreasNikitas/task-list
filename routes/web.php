<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Response;






Route::get('/', function () {
    return redirect()->route('task.index');
});


Route::get('/tasks', function ()  {
    return view('index', [
       'tasks' => \App\Models\Task::latest()->where('is_completed', true)->get()
    ]);
}) ->name('task.index');



Route::view('/tasks/create', 'create')
    ->name('task.create');


Route::get('/tasks/{id}', function ($id)  {
    return view('show', ['task' => \App\Models\Task::findOrFail($id)]);

})  ->name('task.show');


Route::post('/tasks', function(){
    dd('We have reached the store route');
}) ->name('task.store');


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

