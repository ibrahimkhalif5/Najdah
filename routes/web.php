<?php

use App\Models\Project;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\GallaryController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\ProjectCategoryController;

Route::redirect('/', '/en');

Route::group(['prefix' => '{locale}', 'middleware' => 'setLocale'], function () {

    Route::get('/', [GallaryController::class, 'slider'])->name('home');

    Route::get('/contact-us', function () {
        return view('pages.contact');
    })->name('contact-us');

    Route::get('/portal', function () {
        return redirect()->route('home', ['locale' => app()->getLocale()]);
    })->name('portal');

    Route::get('/members', [MemberController::class, 'members'])->name('members');
    Route::get('/gallary', [GallaryController::class, 'gallary'])->name('gallary');
    Route::get('/about-us', [GallaryController::class, 'aboutus'])->name('about-us');
    Route::get('/certificates', [GallaryController::class, 'certificate'])->name('certificate');

    Route::get('/portfolio-details', [ProjectController::class, 'index'])->name('portfolio-details');
    Route::get('/portfolio', [ProjectCategoryController::class, 'category'])->name('portfolio');
    Route::get('/projects-details', [ProjectCategoryController::class, 'projects'])->name('projects');
    Route::get('/thank-you', [ProjectCategoryController::class, 'thanks'])->name('thanks');
    Route::post('/message', [MessageController::class, 'message'])->middleware('throttle:5,10')->name('message');

    Route::get('projects/more', function () {
        $pro = Project::with(['category', 'sponsor', 'user', 'media'])->skip(5)->take(8)->get();
        return view('pages.projects', compact('pro'));
    })->name('projects.more');

    Route::get('/thankyou', function () {
        return view('pages.donationmodel');
    })->name('thankyou');

    Route::get('/donate', function () {
        return view('pages.donate');
    })->name('donate');
});
