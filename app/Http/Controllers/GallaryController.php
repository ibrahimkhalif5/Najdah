<?php

namespace App\Http\Controllers;

use App\Models\Certificate;
use App\Models\Gallary;

class GallaryController extends Controller
{
    public function gallary()
    {
        $data = Gallary::with('media')
            ->latest()
            ->paginate(12)
            ->through(fn ($gal) => [
                'id' => $gal->id,
                'images' => $gal->media->pluck('path')->toArray(),
                'title' => $gal->title,
                'description' => $gal->description,
            ]);

        return view('pages.gallary', compact('data'));
    }

    public function slider()
    {
        $sliders = Gallary::with(['media' => fn ($q) => $q->orderBy('sort_order')->limit(3)])
            ->latest()
            ->take(3)
            ->get();

        $data = [];
        foreach ($sliders as $gal) {
            $images = $gal->media->pluck('path')->toArray();
            $data[] = [
                'id' => $gal->id,
                'images' => $images,
                'title' => $gal->title,
                'description' => $gal->description,
            ];
        }

        return view('pages.home', compact('data'));
    }

    public function certificate()
    {
        $data = Certificate::with('media')
            ->latest()
            ->paginate(12)
            ->through(fn ($cert) => $cert->toArray());

        return view('pages.certificates', compact('data'));
    }

    public function aboutus()
    {
        $data = Certificate::with('media')->get()->toArray();
        return view('pages.about_us', compact('data'));
    }
}
