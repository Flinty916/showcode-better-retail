<?php

use App\Http\Controllers\NodeController;
use App\Http\Controllers\NodeItemCollectionController;
use App\Http\Controllers\NodeItemController;
use App\Http\Controllers\SearchController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

header('Access-Control-Allow-Methods: GET, POST, PATCH, PUT, DELETE, OPTIONS');
header('Access-Control-Allow-Headers: Origin, Content-Type, X-Auth-Token, Authorization, Accept,charset,boundary,Content-Length');
header('Access-Control-Allow-Origin: *');

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::name('shop.')->prefix('/shop')->group(function () {
    Route::prefix('/{shop}')->group(function () {
        Route::name('node.')->prefix('node')->group(function () {
            Route::get('/', [NodeController::class, 'all'])->name('all');
            Route::get('/{node}', [NodeController::class, 'single'])->name('single');
            Route::post('/', [NodeController::class, 'create'])->name('create');
            Route::put('/{node}', [NodeController::class, 'update'])->name('update');
            Route::delete('/{node}', [NodeController::class, 'delete'])->name('delete');
        });
        Route::name('nodeItem.')->prefix('items')->group(function () {
            Route::get('/', [NodeItemController::class, 'all'])->name('all');
            Route::get('/{item}', [NodeItemController::class, 'single'])->name('single');
            Route::post('/', [NodeItemController::class, 'create'])->name('create');
            Route::put('/{item}', [NodeItemController::class, 'update'])->name('update');
            Route::delete('/{item}', [NodeItemController::class, 'delete'])->name('delete');
        });
        Route::name('nodeItemCollection.')->prefix('collections')->group(function () {
            Route::get('/', [NodeItemCollectionController::class, 'all'])->name('all');
            Route::get('/{collection}', [NodeItemCollectionController::class, 'single'])->name('single');
            Route::post('/', [NodeItemCollectionController::class, 'create'])->name('create');
            Route::put('/{collection}', [NodeItemCollectionController::class, 'update'])->name('update');
            Route::delete('/{collection}', [NodeItemCollectionController::class, 'delete'])->name('delete');
            //Add / Remove Items
            Route::post('/{collection}/add', [NodeItemCollectionController::class, 'addItem'])->name('add');
            Route::delete('/{collection}/remove', [NodeItemCollectionController::class, 'removeItem'])->name('remove');
        });
        Route::name('search.')->prefix('search')->group(function () {
            Route::post('/', [SearchController::class, 'search'])->name('search');
            Route::get('/collections', [SearchController::class, 'collections4'])->name('collections');
            Route::get('/items', [SearchController::class, 'random6'])->name('items');
        });
    });
});
