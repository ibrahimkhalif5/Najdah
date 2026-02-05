<?php

namespace App\Http\Controllers;

use App\Models\Gallary;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\GallaryController;

class GallaryController extends Controller
{
    public function gallary(){
        $gallaries = DB::table('gallaries')->get();
        $data = [];
        foreach($gallaries as $gal){
            $images = json_decode($gal->images, true);
            $data[] = [
                'id' => $gal->id,
                'images' => $images,
                'title' => $gal->title,
                'description' => $gal->description
            ];
        }
        return view('pages.gallary', compact('data'));
    }


    public function slider(){
        
        $sliders = DB::table('gallaries')
        ->orderBy('created_at', 'desc')
        ->take(3)
        ->get();
        $data = [];
        foreach($sliders as $gal){
            $images = array_slice(json_decode($gal->images, true), 0, 3);
            $data[] = [
                'id' => $gal->id,
                'images' => $images,
                'title' => $gal->title,
                'description' => $gal->description
            ];
        }
        return view('pages.home', compact('data'));

    }


    public function certificate(){
        $certificates = DB::table('certificates')->get();
        $data = [];
        foreach($certificates as $cert){
            $data[] = [
                'id' => $cert->id,
                'images' => $cert->images,
                'title' => $cert->title,
                'description' => $cert->description
            ];
        }
        return view('pages.certificates', compact('data'));
        
    }
    public function aboutus(){

        
        $certificates = DB::table('certificates')->get();
        $data = [];
        foreach($certificates as $cert){
            $data[] = [
                'id' => $cert->id,
                'images' => $cert->images,
                'title' => $cert->title,
                'description' => $cert->description
            ];
        }
        return view('pages.about_us', compact('data'));
        

}
    
}