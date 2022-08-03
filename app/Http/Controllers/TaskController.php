<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTaskRequest;
use App\Http\Requests\UpdateTaskRequest;
use App\Models\Task;


class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tasks = Task::all();

        return view('Task.index')->with([
            'tasks' => $tasks
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $task = Task::findOrFail($id);

        return view('Task.show')->with([
            'task' => $task
        ]);

    }

    /**
     * Create task page
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Task.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Category\StoreCategoryRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTaskRequest $request)
    {
        $data = $request->validated();
        $task = Task::create($data);

        return redirect()->back();
    }

    /**
     * Edit task page
     *
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        return view('Task.edit');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Category\UpdateCategoryRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(int $id, UpdateTaskRequest $request)
    {
        $data = $request->validated();
        $task = Task::findOrFail($id);

        $task->update($data);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(int $id)
    {
        $task = Task::findOrFail($id);

        $task->delete();
    }
}
