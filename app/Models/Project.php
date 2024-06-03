<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'size',
        'location',
        'category_id',
        'image',
        'completion_date',
        'stage',
        'project_summary_title',
        'project_summary_details',
        'project_team_title',
        'project_team_details',
        'publications',
        'similar_projects'
    ];


    public function getCategoryNamesAttribute()
    {
        $categoryIds = explode(',', $this->category_id);
        $categories = Category::whereIn('id', $categoryIds)->pluck('name')->toArray();
        return $categories;
    }

    public function getSimilarProjects()
    {
        $projectIds = explode(',', $this->similar_projects);
        $similarProjects = Project::whereIn('id', $projectIds)->pluck('name','image')->toArray();
        return $similarProjects;
    }

    public function projectDescriptions()
    {
        return $this->hasMany(ProjectDescription::class);
    }

}
