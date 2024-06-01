<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\Category;
use App\Models\ProjectTeam;
use Illuminate\Validation\Rule;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Project::get();
        return view('admin.project.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $category = Category::get();
        $projectTeam = ProjectTeam::get();
        $project = Project::get();

        return view('admin.project.create', compact('category','projectTeam','project'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|unique:projects',
            'category_id' => 'required',
            'size' => 'required',
            'location' => 'required',
            'sector' => 'required',
            'services' => 'required',
            'clients' => 'required',
            'completion_date' => 'required',
            'desgin' => 'required',
            'developer' => 'required',
            'contractor' => 'required',
            'glazing' => 'required',
            'kitchen' => 'required',
            'havc' => 'required',
            'sanitary' => 'required',
            'publications' => 'required',
            'similar_projects' => 'required',
            'project_materiality' => 'required',
            'project_introduction' => 'required',
            'project_concept' => 'required',
            'isActive' => 'required',
        ]);

        $project = new Project;
        $project->name = $data['name'];
        $project->category_id = implode(",", $data['category_id']);
        $project->size = $data['size'];
        $project->location = $data['location'];
        $project->sector = $data['sector'];
        $project->services = $data['services'];
        $project->clients = $data['clients'];
        $project->completion_date = $data['completion_date'];
        $project->desgin = $data['desgin'];
        $project->developer = $data['developer'];
        $project->contractor = $data['contractor'];
        $project->glazing = $data['glazing'];
        $project->kitchen = $data['kitchen'];
        $project->havc = $data['havc'];
        $project->sanitary = $data['sanitary'];
        $project->publications = $data['publications'];
        $project->similar_projects = implode(",", $data['similar_projects']);
        $project->project_materiality = $data['project_materiality'];
        $project->project_introduction = $data['project_introduction'];
        $project->project_concept = $data['project_concept'];
        $project->isActive = $data['isActive'];


        if($request->file('image'))
        {
            foreach($request->file('image') as $key=>$file)
            {
                $extension = $file->getClientOriginalExtension();
                $destinationPath = 'uploads/projectGallery';
                $filename = date('YmdHis').$key.'.'.$extension;
                $file->move($destinationPath, $filename);
                $img[]=$filename;
            }
            $project->image = implode(',',$img);
        }

        $project->save();

        session()->flash('success', 'Data Create successfully.');

        return redirect()->route('project.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Project $project)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Project $project)
    {
        $data = $project;
        $category = Category::get();
        $projectTeam = ProjectTeam::get();
        $project = Project::whereNotIn('id', [$project->id])->get();

        return view('admin.project.edit', compact('data','category','projectTeam','project'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Project $project)
    {
        $data = $request->validate([
            'name' => ['required','string',Rule::unique('products')->ignore($project->id),],
            'category_id' => 'required',
            'size' => 'required',
            'location' => 'required',
            'sector' => 'required',
            'services' => 'required',
            'clients' => 'required',
            'completion_date' => 'required',
            'desgin' => 'required',
            'developer' => 'required',
            'contractor' => 'required',
            'glazing' => 'required',
            'kitchen' => 'required',
            'havc' => 'required',
            'sanitary' => 'required',
            'publications' => 'required',
            'similar_projects' => 'required',
            'project_materiality' => 'required',
            'project_introduction' => 'required',
            'project_concept' => 'required',
            'isActive' => 'required',
        ]);

        $project = Project::find($project->id);
        $project->name = $data['name'];
        $project->category_id = implode(",", $data['category_id']);
        $project->size = $data['size'];
        $project->location = $data['location'];
        $project->sector = $data['sector'];
        $project->services = $data['services'];
        $project->clients = $data['clients'];
        $project->completion_date = $data['completion_date'];
        $project->desgin = $data['desgin'];
        $project->developer = $data['developer'];
        $project->contractor = $data['contractor'];
        $project->glazing = $data['glazing'];
        $project->kitchen = $data['kitchen'];
        $project->havc = $data['havc'];
        $project->sanitary = $data['sanitary'];
        $project->publications = $data['publications'];
        $project->similar_projects = implode(",", $data['similar_projects']);
        $project->project_materiality = $data['project_materiality'];
        $project->project_introduction = $data['project_introduction'];
        $project->project_concept = $data['project_concept'];
        $project->isActive = $data['isActive'];


        if($request->file('image'))
        {
            foreach($request->file('image') as $key=>$file)
            {
                $extension = $file->getClientOriginalExtension();
                $destinationPath = 'uploads/projectGallery';
                $filename = date('YmdHis').$key.'.'.$extension;
                $file->move($destinationPath, $filename);
                $img[]=$filename;
            }
            
            $project->image = implode(',',$img);
        }

        $project->save();

        session()->flash('success', 'Data Update successfully.');

        return redirect()->route('project.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {
        $project->delete();

        session()->flash('success', 'Date deleted successfully.');

        return redirect()->route('project.index');
    }

    public function projectDetailsImage(Request $request)
    {
        if ($request->hasFile('upload')) {
            $originName = $request->file('upload')->getClientOriginalName();
            $fileName = pathinfo($originName, PATHINFO_FILENAME);
            $extension = $request->file('upload')->getClientOriginalExtension();
            $fileName = $fileName . '_' . time() . '.' . $extension;
      
            $request->file('upload')->move(public_path('uploads/projectGallery'), $fileName);
      
            $url = asset('uploads/projectGallery/' . $fileName);
    
            return response()->json(['fileName' => $fileName, 'uploaded'=> 1, 'url' => $url]);
        }
    }

    public function removeProjectImage(Request $request){
        $data = Project::find($request->productId);

        if ($data) {
           $galleryImages = explode(',', $data->image);
           $index = array_search($request->imageName, $galleryImages);

           if ($index !== false) {
               unset($galleryImages[$index]);
               $data->image = implode(',', $galleryImages);
               $data->save();
           }
       }

       // Return a JSON response indicating success
       return response()->json(['success' => true]);
    }
}
