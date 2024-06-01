<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ProjectTeam;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ProjectTeamController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = ProjectTeam::get();

        return view('admin.projectTeam.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.projectTeam.create');
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'isActive' => 'required',
        ]);

        $projectTeam = new ProjectTeam;
        $projectTeam->name = $data['name'];
        $projectTeam->isActive = $data['isActive'];
        $projectTeam->save();

        session()->flash('success', 'Data Create successfully.');

        return redirect()->route('projectTeam.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(ProjectTeam $projectTeam)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ProjectTeam $projectTeam)
    {
        $data = $projectTeam;
        return view('admin.projectTeam.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ProjectTeam $projectTeam)
    {
        $data = $request->validate([
            'name' => [
                    'required',
                    'string',
                    'max:255',
                    Rule::unique('project_teams')->ignore($projectTeam->id),
                ],
            'isActive' => 'required',
        ]);

        $projectTeam = ProjectTeam::findOrFail($projectTeam->id);
        $projectTeam->name = $data['name'];
        $projectTeam->isActive = $data['isActive'];
        $projectTeam->save();

        session()->flash('success', 'Data Update successfully.');

        return redirect()->route('projectTeam.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ProjectTeam $projectTeam)
    {
        $projectTeam->delete();

        session()->flash('success', 'Date deleted successfully.');

        return redirect()->route('projectTeam.index');
    }
}
