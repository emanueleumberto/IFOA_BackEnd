<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Http\Requests\StoreProjectRequest;
use App\Http\Requests\UpdateProjectRequest;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //return Project::get();
        //return Auth::user();
        $projects = Project::with('activities')
                        ->where('user_id', '=', Auth::user()->id)
                        //->paginate(5);
                        ->get();
        //return $projects;
        return view('projects', ['projects' => $projects]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('create_project');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProjectRequest $request)
    {
        $data = $request->only(['name', 'description', 'type', 'language']);
        $data['state'] = 'create';
        $data['user_id'] = Auth::user()->id;
        $data['created_at'] = Carbon::now();
        //dd($data);
        Project::create($data);
        return redirect()->action([ProjectController::class, 'index']);
    }

    /**
     * Display the specified resource.
     */
    public function show(Project $project)
    {
        //return view('project_detail', ['project' => $project]);
        //return $project->load('activities');
        return view('project_detail', ['project' => $project->load('activities')]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Project $project)
    {
        return view('edit_project', ['project' => $project]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProjectRequest $request, Project $project)
    {
        $project['name'] = $request->name;
        $project['description'] = $request->description;
        $project['type'] = $request->type;
        $project['language'] = $request->language;
        $project['state'] = $request->state;
        $project['updated_at'] = Carbon::now();

        $project->update();
        return redirect('/projects');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {
        $project->delete();
        return redirect('/projects');
    }
}
