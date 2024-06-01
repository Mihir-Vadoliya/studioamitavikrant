<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'image',
        'category_id',
        'size',
        'location',
        'sector',
        'services',
        'clients',
        'completion_date',
        'desgin',
        'developer',
        'contractor',
        'glazing',
        'kitchen',
        'havc',
        'sanitary',
        'publications',
        'similar_projects',
        'project_materiality',
        'project_introduction',
        'project_concept',
        'stage',
        'isActive'
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
}
