<?php



use App\Models\Project;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\GallaryController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\ProjectCategoryController;
use TCG\Voyager\Http\Controllers\VoyagerAuthController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



// Route::group(['prefix' => 'admin'], function () {
//     Voyager::routes();

//     Route::get('login', [VoyagerAuthController::class, 'login'])->name('voyager.login');
// });


Route::redirect('/', '/en');

Route::group(['prefix' => '{locale}', 'middleware' => 'setLocale'], function () {
   
    
    Route::get('/',[GallaryController::class,'slider'])->name('home');

    Route::get('/contact-us', function () {
        return view('pages.contact');
    })->name('contact-us');

    
    Route::get('/portal', function () {
        return view('studentportal.portal');
    })->name('portal');
    Route::get('/members',[MemberController::class,'members'])->name('members');
    Route::get('/gallary',[GallaryController::class,'gallary'])->name('gallary');
    Route::get('/about-us',[GallaryController::class,'aboutus'])->name('about-us');
    Route::get('/certificates',[GallaryController::class,'certificate'])->name('certificate');
    
    Route::get('/portfolio-details',[ProjectController::class,'index'])->name('portfolio-details');
    Route::get('/portfolio',[ProjectCategoryController::class,'category'])->name('portfolio');
    Route::get('/projects-details',[ProjectCategoryController::class,'projects'])->name('projects');
    Route::get('/thank-you',[ProjectCategoryController::class,'thanks'])->name('thanks');
    Route::post('/message',[MessageController::class,'massage'])->name('message');

        Route::get('projects/more', function() {
            $pro = Project::skip(5)->take(8)->get();
            return view('pages.projects', compact('pro'));
        })->name('projects.more');
    
        Route::get('/thankyou', function () {
            return view('pages.donationmodel');
        })->name('thankyou');
        

    });
    
    