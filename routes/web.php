<?php
declare(strict_types=1);

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\MainController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [MainController::class, 'index'])
->name('mainpage');

Route::group([
    'prefix' => 'administrator',
    'namespace' => 'Admin',
    'as' => 'admin.',
    'middleware' => ['auth'],
], function(){

    Route::get('', [AdminController::class, 'index'])
    ->name('mainpage');

    Route::get('subsites', [AdminController::class, 'subsites'])
    ->name('subsites');

    Route::get('addOrEditSubsite', [AdminController::class, 'addOrEditSubsiteForm'])
    ->name('addOrEditSubsiteForm');

    Route::post('saveSubsite', [AdminController::class, 'saveSubsite'])
    ->name('saveSubsite');

    Route::post('deleteSubsite', [AdminController::class, 'deleteSubsite'])
    ->name('deleteSubsite');

    Route::get('articles', [AdminController::class, 'articles'])
    ->name('articles');

    Route::get('addOrEditArticle', [AdminController::class, 'addOrEditArticleForm'])
    ->name('addOrEditArticleForm');




});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
