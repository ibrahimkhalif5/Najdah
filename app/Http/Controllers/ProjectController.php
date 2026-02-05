<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;
use App\Models\ProjectCategory;
use App\Http\Controllers\ProjectController;

class ProjectController extends Controller
{
    public function index()
    {

        $project = Project::with('category')->get();
        $cat = ProjectCategory::with('projects')->get();
        return view('pages.portfolio-details')->with('project',$project)->with('cat',$cat);
        
    }
   
}