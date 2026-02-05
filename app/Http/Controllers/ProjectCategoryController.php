<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;
use App\Models\ProjectCategory;
use App\Http\Controllers\ProjectCategoryController;

class ProjectCategoryController extends Controller
{
    public function category()
    {
        $cat= ProjectCategory::all();
         $procat=Project::all();
        return view('pages.portfolio',compact('cat','procat'));
    }
    public function projects()
{
    $pro = Project::take(5)->get();
    $cat = ProjectCategory::all();
    return view('pages.projects', compact('pro', 'cat'));
}

    
    
}