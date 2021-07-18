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


Route::name('data.')->prefix('data')->group(function () {
    Route::name('shop.')->prefix('/shop')->group(function () {
        Route::prefix('/{shop}')->group(function() {
            Route::name('node.')->prefix('node')->group(function () {
                Route::get('/', [NodeController::class, 'all'])->name('all');
                Route::get('/{node}', [NodeController::class, 'single'])->name('single');
                Route::post('/', [NodeController::class, 'create'])->name('create');
                Route::put('/{node}', [NodeController::class, 'update'])->name('update');
                Route::delete('/{node}', [NodeController::class, 'delete'])->name('delete');
            });
            Route::name('nodeItem.')->prefix('items')->group(function() {
                Route::get('/', [NodeItemController::class, 'all'])->name('all');
                Route::get('/{item}', [NodeItemController::class, 'single'])->name('single');
                Route::post('/', [NodeItemController::class, 'create'])->name('create');
                Route::put('/{item}', [NodeItemController::class, 'update'])->name('update');
                Route::delete('/{item}', [NodeItemController::class, 'delete'])->name('delete');
            });
            Route::name('nodeItemCollection.')->prefix('collections')->group(function() {
                Route::get('/', [NodeItemCollectionController::class, 'all'])->name('all');
                Route::get('/{collection}', [NodeItemCollectionController::class, 'single'])->name('single');
                Route::post('/', [NodeItemCollectionController::class, 'create'])->name('create');
                Route::put('/{collection}', [NodeItemCollectionController::class, 'update'])->name('update');
                Route::delete('/{collection}', [NodeItemCollectionController::class, 'delete'])->name('delete');
                //Add / Remove Items
                Route::post('/{collection}/add', [NodeItemCollectionController::class, 'addItem'])->name('add');
                Route::delete('/{collection}/remove', [NodeItemCollectionController::class, 'removeItem'])->name('remove');
            });
            Route::name('search.')->prefix('search')->group(function() {
                Route::post('/', [SearchController::class, 'search'])->name('search');
                Route::get('/collections', [SearchController::class, 'collections4'])->name('collections');
                Route::get('/items', [SearchController::class, 'random6'])->name('items');
            });
        });
    });
});


require __DIR__ . '/auth.php';
