<?php

namespace App\Http\Controllers;

use App\Models\Sponsor;

class SponsorController extends Controller
{
    public function index()
    {
        $sponsors = Sponsor::with('media')->get();
        return response()->json($sponsors);
    }
}
