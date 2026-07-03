<?php

namespace App\Http\Controllers;

use App\Models\Project;

class ProjectController extends Controller
{
    public function index()
    {
        $project = Project::with(['category', 'sponsor', 'user', 'media'])->paginate(20);
        return view('pages.portfolio-details')->with('project', $project);
    }
}
