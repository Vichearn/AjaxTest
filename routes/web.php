<?php

use App\Task;

Route::get('/', function () {
    $tasks = Task::all();

    return View::make('welcome')->with('tasks',$tasks);
});

//Ajax Routes
Route::get('/tasks/{task_id?}',function($task_id){
    $task = Task::find($task_id);

    return Response::json($task);
});

Route::post('/tasks',function(Request $request){
    $task = Task::create($request->all());

    return Response::json($task);
});

Route::put('/tasks/{task_id?}',function(Request $request,$task_id){
    $task = Task::find($task_id);

    $task->task = $request->task;
    $task->description = $request->description;

    $task->save();

    return Response::json($task);
});

Route::delete('/tasks/{task_id?}',function($task_id){
    $task = Task::destroy($task_id);

    return Response::json($task);
});


//Routes Test

/*Route::get('/', function () {
    return view('welcome');
});*/ 
//Route::view('/', 'Hello'); ก็ได้

//Route::view('/Hello', 'Hello'); //View แสดง Hello ไม่มี Controller
//Route::view('/Hello', 'Hello', ['name' => 'Taylor']); //View Hello {{ $name }}

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('ajax',function(){
   return view('message');
});
Route::post('/getmsg','AjaxController@index');