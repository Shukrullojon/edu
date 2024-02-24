<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\User;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tasks = Task::latest()->paginate(20);
        return view('task.index',[
            'tasks' => $tasks,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $users = User::get()->pluck('name','id');
        return view('task.create',[
            'users' => $users,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'comment' => 'required',
            'time' => 'required',
            'day' => 'required',
            'type' => 'required',
            'attach_user_id' => 'required',
        ]);
        $request->request->add([
            'user_id' => auth()->user()->id,
            'status' => 1,
        ]);
        Task::create($request->all());
        return redirect()->route('task.index')->with('success','Task created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Task $task)
    {

        return view('task.show',[
            'task' => $task,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Task $task)
    {
        $users = User::get()->pluck('name','id');
        return view('task.edit',[
            'task' => $task,
            'users' => $users,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Task $task)
    {
        $this->validate($request, [
            'name' => 'required',
            'comment' => 'required',
            'time' => 'required',
            'day' => 'required',
            'type' => 'required',
            'attach_user_id' => 'required',
        ]);
        $task->update($request->all());
        return redirect()->route('task.index')->with('success','Task updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Task $task)
    {
        $task->update([
            'close_user_id' => auth()->user()->id,
            'status' => 0,
        ]);
        return back()->with('success','Task archived successfully');
    }

    public function list(Request $request){
        $tasks = Task::where('attach_user_id',auth()->user()->id)->paginate(30);
        return view('task.list',[
            'tasks' => $tasks,
        ]);
    }

    public function finish($id){
        $task = Task::where('id',$id)->first();
        $task->update([
            'close_user_id' => auth()->user()->id,
            'status' => 0,
        ]);
        return back()->with('success','Task archived successfully');
    }
}
