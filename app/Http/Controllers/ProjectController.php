<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Pass All Data from DB
        $projects = Project::whrere('user_id',Auth::id())->get();
        // Return Page Indexand Pass Variable
        return view('project.index',compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Return Page Create project
        return view('project.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Get Data In Create page And Save
        // Test
        //dd($request->all()); //Done


        // Validate Data
        request()->validate([
            'title'=>'required',
            'description'=> 'required'
        ]);

        // Send Data in DB
        $project = new Project; // Object for Model
        // obj  -> fieldDB = title Request for view
        $project->title = $request->title;
        $project->description = $request->description;
        $project-> user_id = Auth::id();
        // Save Project
        $project->save();
        // dd($project->all());
        // After Save Data Redirect Page
        return redirect('/project');
    }

    /**
     * Display the specified resource.
     */
    public function show(Project $project)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Project $project)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Project $project)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {
        //
    }
}