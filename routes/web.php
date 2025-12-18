<?php

use Illuminate\Support\Facades\Route;
use Symfony\Component\HttpFoundation\Response;
use App\Models\Task;
use Symfony\Component\HttpFoundation\Request;

Route::get('/', function () {
    return redirect()->route('tasks.index');
});

Route::get('/tasks', function () {
    $tasks = Task::latest()->paginate();
    return view('index', [
        'tasks' => $tasks
    ]);
})->name('tasks.index');

Route::view('/tasks/create', 'create')->name('tasks.create');

Route::get('/tasks/{task}', function (Task $task) {
    // $task = App\Models\Task::findorFail($id);
    // $task = collect($tasks)->firstWhere('id', $id);
    // if (!$task) {
    //     abort(Response::HTTP_NOT_FOUND);
    // }

    return view('show', [
        'taskData' => $task
    ]);
})->name('tasks.show');


Route::post('/tasks', function (Request $request) {
    $data = $request->validate([
        'title' => 'required|max:255',
        'description' => 'required',
        'long_description' => 'required',
    ]);

    $task = Task::create($data);

    return redirect()->route('tasks.show', ['task' => $task->id])
        ->with('success', 'Task created successfully!');
})->name('tasks.store');

Route::get('/tasks/{task}/edit', function (Task $task) {
    // $task = Task::findorFail($id);
    return view('edit', [
        'taskData' => $task
    ]);
})->name('tasks.edit');


Route::put('/tasks/{task}', function (Task $task, Request $request) {
    // dd($request->all());
    $data = $request->validate([
        'title' => 'required|max:255',
        'description' => 'required',
        'long_description' => 'required',
    ]);

    $task->update($data);

    return redirect()->route('tasks.show', ['task' => $task->id])
        ->with('success', 'Task Updated successfully!');
})->name('tasks.update');


Route::Delete('/tasks/{task}', function (Task $task) {
    // $task = Task::findorFail($id);
    $task->delete();

    return redirect()->route('tasks.index')
        ->with('success', 'Task Deleted successfully!');
})->name('tasks.destroy');

Route::put('/tasks/{task}/toggle-complete', function (Task $task) {
    $task->toggleComplete();

    return redirect()->route('tasks.index')
        ->with('success', 'Task marked as completed!');
})->name('tasks.complete');

Route::fallback(function () {
    return "Still working on it...";
});
