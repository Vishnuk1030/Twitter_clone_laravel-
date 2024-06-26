<?php

use App\Http\Controllers\Admin\CommentController as AdminCommentController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FeedController;
use App\Http\Controllers\FollowerController;
use App\Http\Controllers\IdeaController;
use App\Http\Controllers\IdeaLikeontroller;
use App\Http\Controllers\UserController;
use Database\Factories\UserFactory;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\Admin\IdeaController as AdminIdeaController;
use App\Http\Controllers\Admin\UserController as AdminUserController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|

Model view controller--

controller : Handle request and interact with model and views

model : Handle the data logic and interaction with database

View :what should be shown to the user(HTML and css/blade files)

*/

Route::get('lang/{lang}', function ($lang) {
    app()->setLocale($lang);

    session()->put('locale', $lang);
    return redirect()->route('dashboard');
})->name('lang');

//Dashboard
Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

Route::resource('ideas', IdeaController::class)->except(['index', 'create', 'show'])->middleware('auth');

Route::resource('ideas', IdeaController::class)->only(['show']);

//ideas/{idea}/comments/
Route::resource('ideas.comments', CommentController::class)->only(['store'])->middleware('auth');

Route::resource('users', UserController::class)->only('show');


Route::resource('users', UserController::class)->only('edit', 'update')->middleware('auth');

Route::get('profile', [UserController::class, 'profile'])->middleware('auth')->name('profile');

Route::post('users/{user}/follow', [FollowerController::class, 'follow'])->middleware('auth')->name('users.follow');
Route::post('users/{user}/unfollow', [FollowerController::class, 'unfollow'])->middleware('auth')->name('users.unfollow');


Route::post('ideas/{idea}/like', [IdeaLikeontroller::class, 'like'])->middleware('auth')->name('ideas.like');
Route::post('ideas/{idea}/unlike', [IdeaLikeontroller::class, 'unlike'])->middleware('auth')->name('ideas.unlike');


Route::get('/feed', FeedController::class)->middleware('auth')->name('feed');


Route::get('/terms', function () {

    return view('terms');
})->name('terms');

Route::middleware(['auth', 'can:admin'])->prefix('/admin')->as('admin.')->group(function () {
    Route::get('/', [AdminDashboardController::class, 'index'])->name('dashboard');

    Route::resource('users', AdminUserController::class)->only('index');

    Route::resource('ideas', AdminIdeaController::class)->only('index');

    Route::resource('comments', AdminCommentController::class)->only('index','destroy');

});
