<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\Category;
use App\Models\ProjectTeam;
use App\Models\ProjectDescription;
use App\Models\MetaSettings;
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
        // $data = $request->validate([
        //     'name' => 'required|string|unique:projects',
        //     'category_id' => 'required',
        //     'size' => 'required',
        //     'location' => 'required',
        //     'sector' => 'required',
        //     'services' => 'required',
        //     'clients' => 'required',
        //     'completion_date' => 'required',
        //     'desgin' => 'required',
        //     'developer' => 'required',
        //     'contractor' => 'required',
        //     'glazing' => 'required',
        //     'kitchen' => 'required',
        //     'havc' => 'required',
        //     'sanitary' => 'required',
        //     'publications' => 'required',
        //     'similar_projects' => 'required',
        //     'project_materiality' => 'required',
        //     'project_introduction' => 'required',
        //     'project_concept' => 'required',
        //     'isActive' => 'required',
        // ]);
        
        $data = $request->validate([
            'name' => '',
            'size' => '',
            'location' => '',
            'category_id' => '',
            'completion_date' => '',
            'stage' => '',
            'project_summary_title' => '',
            'project_summary_details' => '',
            'project_team_title' => '',
            'project_team_details' => '',
            'publications' => '',
            'similar_projects' => '',
        ]);

        $project = new Project;
        $project->name = $data['name'];
        $project->size = $data['size'];
        $project->location = $data['location'];
        $project->category_id = implode(",", $data['category_id']??[]);
        $project->completion_date = $data['completion_date'];
        $project->stage = $data['stage']??'';
        $project->project_summary_title = $data['project_summary_title']??'';
        $project->project_summary_details = $data['project_summary_details']??'';
        $project->project_team_title = $data['project_team_title']??'';
        $project->project_team_details = $data['project_team_details']??'';
        $project->publications = $data['publications']??'';
        $project->similar_projects = implode(",", $data['similar_projects']??[]);

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

        foreach ($request->project_description_title as $key => $title) {
            ProjectDescription::create([
                'project_id' => $project->id,
                'title' => $title,
                'description' => $request->project_description[$key]
            ]);
        }

        $metaDetails = json_encode([
            'meta_title' => $request->meta_title ?? null,
            'meta_keywords' => $request->meta_keywords ?? null,
            'meta_description' => $request->meta_description ?? null,
        ]);

        MetaSettings::updateOrCreate(
            [
                'refferance_id' => $project->id,
                'page' => "project"
            ],
            [
                'meta_details' => $metaDetails
            ]
        );

        session()->flash('success', 'Data Create successfully.');

        return redirect()->back();
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
        $projectDescriptions = ProjectDescription::where('project_id',$project->id)->get();
        $category = Category::get();
        $projectTeam = ProjectTeam::get();
        $project = Project::whereNotIn('id', [$project->id])->get();

        $metaData = MetaSettings::where('refferance_id', $data->id)->where('page', 'project')->first();

        return view('admin.project.edit', compact('data','category','projectTeam','project','projectDescriptions', 'metaData'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Project $project)
    {
        // $data = $request->validate([
        //     'name' => ['required','string',Rule::unique('products')->ignore($project->id),],
        //     'category_id' => 'required',
        //     'size' => 'required',
        //     'location' => 'required',
        //     'sector' => 'required',
        //     'services' => 'required',
        //     'clients' => 'required',
        //     'completion_date' => 'required',
        //     'desgin' => 'required',
        //     'developer' => 'required',
        //     'contractor' => 'required',
        //     'glazing' => 'required',
        //     'kitchen' => 'required',
        //     'havc' => 'required',
        //     'sanitary' => 'required',
        //     'publications' => 'required',
        //     'similar_projects' => 'required',
        //     'project_materiality' => 'required',
        //     'project_introduction' => 'required',
        //     'project_concept' => 'required',
        //     'isActive' => 'required',
        // ]);


        $data = $request->validate([
            'name' => '',
            'size' => '',
            'location' => '',
            'category_id' => '',
            'completion_date' => '',
            'stage' => '',
            'project_summary_title' => '',
            'project_summary_details' => '',
            'project_team_title' => '',
            'project_team_details' => '',
            'publications' => '',
            'similar_projects' => '',
        ]);

        $project = Project::find($project->id);
        $project->name = $data['name'];
        $project->size = $data['size'];
        $project->location = $data['location'];
        $project->category_id = implode(",", $data['category_id']??[]);
        $project->completion_date = $data['completion_date'];
        $project->stage = $data['stage']??'';
        $project->project_summary_title = $data['project_summary_title']??'';
        $project->project_summary_details = $data['project_summary_details']??'';
        $project->project_team_title = $data['project_team_title']??'';
        $project->project_team_details = $data['project_team_details']??'';
        $project->publications = $data['publications']??'';
        $project->similar_projects = implode(",", $data['similar_projects']??[]);

        if ($request->hasFile('image')) {
            foreach ($request->file('image') as $file) {
                $extension = $file->getClientOriginalExtension();
                $destinationPath = 'uploads/projectGallery';
                $filename = date('YmdHis') . '_' . uniqid() . '.' . $extension; // Use uniqid to ensure unique filenames
                $file->move($destinationPath, $filename);
                $img[] = $filename;
            }
            
            // Retrieve existing images and merge them with the new ones
            $existingImages = explode(',', $project->image);
            $img = array_merge($existingImages, $img);
            
            // Update the project's image field with the merged array
            $project->image = implode(',', $img);
        }

        $project->save();


        if($request->project_description_id) {
            $existingIds = ProjectDescription::where('project_id', $project->id)->pluck('id')->toArray();

            $requestIds = $request->project_description_id;

            $idsToDelete = array_diff($existingIds, $requestIds);

            ProjectDescription::whereIn('id', $idsToDelete)->delete();
        }
        

        foreach ($request->project_description_title as $key => $title) {
            if(isset($request->project_description_id[$key]) && !empty($request->project_description_id[$key])) {
                // Update existing record
                $ProjectDescription = ProjectDescription::find($request->project_description_id[$key]);
                if($ProjectDescription) {
                    $ProjectDescription->title = $title ?? '';
                    $ProjectDescription->description = $request->project_description[$key] ?? '';
                    $ProjectDescription->save();
                }

            } else {
                // Create new record
                $ProjectDescription = new ProjectDescription();
                $ProjectDescription->project_id = $project->id ?? '';
                $ProjectDescription->title = $title ?? '';
                $ProjectDescription->description = $request->project_description[$key] ?? '';
                $ProjectDescription->save();
            }
        }

        $metaDetails = json_encode([
            'meta_title' => $request->meta_title ?? null,
            'meta_keywords' => $request->meta_keywords ?? null,
            'meta_description' => $request->meta_description ?? null,
        ]);

        MetaSettings::updateOrCreate(
            [
                'refferance_id' => $project->id,
                'page' => 'project'
            ],
            [
                'meta_details' => $metaDetails
            ]
        );

        session()->flash('success', 'Data Update successfully.');

        return redirect()->back();
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
