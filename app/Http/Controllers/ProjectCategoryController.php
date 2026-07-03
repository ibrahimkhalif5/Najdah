<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\ProjectCategory;

class ProjectCategoryController extends Controller
{
    public function category()
    {
        $cat = ProjectCategory::withCount('projects')->get();
        return view('pages.portfolio', compact('cat'));
    }

    public function projects()
    {
        $pro = Project::with(['category', 'sponsor', 'user', 'media'])
            ->latest()
            ->take(5)
            ->get();
        return view('pages.projects', compact('pro'));
    }

    public function thanks()
    {
        return view('pages.donationmodel');
    }
}
