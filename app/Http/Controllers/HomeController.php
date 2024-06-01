<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;
use App\Models\Category;
use App\Models\Project;
use App\Models\ProjectDescription;
use App\Models\MetaSettings;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $projects = Project::latest('completion_date')->take(7)->get();

        return view('front.index',compact('projects'));
    }

    public function contact()
    {
        return view('front.contact');
    }

    public function projectDetails(Request $request, $projectName)
    {
        $project = Project::where('name', str_replace('_', ' ', $projectName))->first();
        $projectDescriptions = ProjectDescription::where('project_id',$project->id)->get();

        $metaData = MetaSettings::where('refferance_id', $project->id)->where('page', 'project')->first();
        
        return view('front.projectDetails', compact('project', 'projectDescriptions', 'metaData'));
    }

    public function projectList()
    {
        $project = Project::get();

        return view('front.projectList', compact('project'));
    }

    public function news()
    {
        $data = Blog::where('page','news')->with('category')->get();
        
        return view('front.news',compact('data'));
    }

    public function newsDetails(Request $request)
    {
        $data = Blog::where('id', $request->newsDetails)->first();

        $previousRecord = Blog::where('page','news')->where('id', '<', $request->newsDetails)->orderBy('id', 'desc')->first();
        $nextRecord = Blog::where('page','news')->where('id', '>', $request->newsDetails)->orderBy('id', 'asc')->first();

        $relatedBogs = explode(",", $data->relatedBogs);
        $relatedBlogs = Blog::whereIn('id', $relatedBogs)->get();

        $metaData = MetaSettings::where('refferance_id', $data->id)->where('page', $data->page)->first();

        return view('front.newsDetails',compact('data','previousRecord', 'nextRecord', 'relatedBlogs', 'metaData'));
    }

    public function research()
    {
        $data = Blog::where('page','research')->with('category')->get();

        return view('front.research',compact('data'));
    }

    public function researchDetails(Request $request)
    {
        $data = Blog::where('id', $request->researchDetails)->first();

        $previousRecord = Blog::where('page','research')->where('id', '<', $request->researchDetails)->orderBy('id', 'desc')->first();
        $nextRecord = Blog::where('page','research')->where('id', '>', $request->researchDetails)->orderBy('id', 'asc')->first();

        $relatedBogs = explode(",", $data->relatedBogs);
        $relatedBlogs = Blog::whereIn('id', $relatedBogs)->get();

        $metaData = MetaSettings::where('refferance_id', $data->id)->where('page', $data->page)->first();

        return view('front.researchDetails',compact('data','previousRecord', 'nextRecord', 'relatedBlogs', 'metaData'));
    }

    public function partners()
    {
        return view('front.partners');
    }

    public function people()
    {
        return view('front.people');
    }

    public function process()
    {
        return view('front.process');
    }

    public function profile()
    {
        return view('front.profile');
    }

}
