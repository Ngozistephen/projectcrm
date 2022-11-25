<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Client;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Gate;
use App\Http\Requests\EditProjectRequest;
use App\Http\Requests\CreateProjectRequest;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $projects = Project::with(['user', 'client'])->filterStatus(request('status'))->paginate(10);

        return view ('dashboard.projects.index', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::all()->pluck('full_name', 'id');
        $clients = Client::all()->pluck('company_name', 'id');

        return view('dashboard.projects.create', compact('users', 'clients'));
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateProjectRequest $request)
    {
        $project = Project::create($request->validated());

        $user = User::find($request->user_id);

        return redirect()->route('dashboard.projects.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function show(Project $project)

    {
        $project->load('tasks', 'user', 'client');
        return view('dashboard.projects.show', compact('project'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function edit(Project $project)
    {
        $users = User::all()->pluck('full_name', 'id');
        $clients = Client::all()->pluck('company_name', 'id');
        return view('dashboard.projects.edit', compact('project','users','clients'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function update(EditProjectRequest $request, Project $project)
    {
        if ($project->user_id !== $request->user_id) {
            $user = User::find($request->user_id);

            // $user->notify(new ProjectAssigned($project));
        }

        $project->update($request->validated());

        return redirect()->route('dashbpard.projects.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project)
    {
        abort_if(Gate::denies('delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');
    }
}
