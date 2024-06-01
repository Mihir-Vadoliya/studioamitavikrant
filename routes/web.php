<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\admin\AdminLoginController;
use App\Http\Controllers\admin\AdminDashboardController;
use App\Http\Controllers\admin\CategoryController;
use App\Http\Controllers\admin\ProjectController;
use App\Http\Controllers\admin\BlogController;
use App\Http\Controllers\admin\ProjectTeamController;

use App\Http\Controllers\HomeController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Auth::routes();

//Admin Routes
Route::group(['prefix' => 'admin', 'middleware' => ['guest']], function(){
    Route::get('/login', [AdminLoginController::class, 'login'])->name('adminLogin');
    Route::post('/login', [AdminLoginController::class, 'doLogin'])->name('doLogin');
    Route::get('/forgot-password', [AdminLoginController::class, 'forgotPassword'])->name('adminForgotPassword');
    Route::post('/send-reset-password-link', [AdminLoginController::class, 'sendResetPasswordEmail'])->name('adminSendResetPasswordEmail');
    Route::get('/reset-password/{token}', [AdminLoginController::class, 'sendToken'])->name('admin.password.reset');
    Route::post('/update-password', [AdminLoginController::class, 'resetPassword'])->name('adminResetPassword');
    
});

Route::group(['prefix' => 'admin', 'middleware' => ['userAccess:admin', 'PreventBackHistory']], function(){
     /*Dashboard Routes*/
    Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('admin.dashboard');
    
    Route::get('/change-password', [AdminLoginController::class, 'requestChangePassword'])->name('admin.requestChangePassword');
    Route::post('/change-password', [AdminLoginController::class, 'setChangePassword'])->name('admin.setChangePassword');
    
    Route::resource('/category', CategoryController::class);
    Route::resource('/projectTeam', ProjectTeamController::class);
    Route::resource('/blog', BlogController::class);
    Route::resource('/project', ProjectController::class);
    
});
    Route::post('/blog-image', [BlogController::class, 'ckUploadimage'])->name('blogImage');
    Route::post('/projectDetailsImage', [ProjectController::class, 'projectDetailsImage'])->name('projectDetailsImage');
    Route::post('/removeProjectImage', [ProjectController::class, 'removeProjectImage'])->name('removeProjectImage');

// User

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/contact', [HomeController::class, 'contact'])->name('contact');
Route::get('/project-list', [HomeController::class, 'projectList'])->name('project_list');
Route::get('/project/{projectName}', [HomeController::class, 'projectDetails'])->name('project_details');

Route::get('/partners', [HomeController::class, 'partners'])->name('partners');
Route::get('/people', [HomeController::class, 'people'])->name('people');
Route::get('/process', [HomeController::class, 'process'])->name('process');
Route::get('/profile', [HomeController::class, 'profile'])->name('profile');

Route::get('/news', [HomeController::class, 'news'])->name('news');
Route::get('/news/{newsDetails}', [HomeController::class, 'newsDetails'])->name('newsDetails');

Route::get('/research', [HomeController::class, 'research'])->name('research');
Route::get('/research/{researchDetails}', [HomeController::class, 'researchDetails'])->name('researchDetails');