<?php

use App\Http\Controllers\SearchController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\Auth\SocialiteController;
use App\Http\Controllers\NodeController;
use App\Http\Controllers\NodeItemController;
use App\Http\Controllers\NodeItemCollectionController;

header('Access-Control-Allow-Methods: GET, POST, PATCH, PUT, DELETE, OPTIONS');
header('Access-Control-Allow-Headers: Origin, Content-Type, X-Auth-Token, Authorization, Accept,charset,boundary,Content-Length');
header('Access-Control-Allow-Origin: *');
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

Route::get('login/{provider}', [SocialiteController::class, 'redirect']);
Route::get('login/{provider}/callback', [SocialiteController::class, 'callback']);

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
})->name("welcome");


Route::middleware('auth')->group(function () {
    Route::get('/dashboard', function () {
        return Inertia::render('Dashboard', [
            'isManager' => Auth::user()->isManager(),
        ]);
    })->name('dashboard');

    Route::get('/search', function () {
        return Inertia::render('Search', [
            'isManager' => Auth::user()->isManager(),
        ]);
    })->name('search');

    Route::get('/profile', function () {
        return Inertia::render('Profile', [
            'isManager' => Auth::user()->isManager(),
        ]);
    })->name('profile');
    Route::get('/map/manage', function () {
        return Inertia::render('Map', [
            'isManager' => Auth::user()->isManager(),
        ]);
    })->name('map.manage');
});



require __DIR__ . '/auth.php';
