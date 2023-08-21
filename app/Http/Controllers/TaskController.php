<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        // Test
        dd($request->all());

        // Make Validate
        request()->validate([
            'body' => 'required',
        ]);
        $task = new Task;
        $task->body = $request->body;
        $task->project_id =$request->project_id;
        $task->save();

        // After Save Redirect Page
        return back();
    }

    /**
     * Display the specified resource.
     */
    public function show(Task $task)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Task $task)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Project $project, Task $task,Request $request)
    {
        // Make Validate
        request()->validate([
            'done'=>'in:0,1|required'
        ]);

        $task->done = (bool) $request->done;
        $task->save();

        return back();

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Task $task)
    {
        //
    }
}
