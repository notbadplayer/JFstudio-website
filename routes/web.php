<?php
declare(strict_types=1);

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\CKEditorController;
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

    Route::post('saveArticle', [AdminController::class, 'saveArticle'])
    ->name('saveArticle');

    Route::post('deleteArticle', [AdminController::class, 'deleteArticle'])
    ->name('deleteArticle');

    Route::get('files', [AdminController::class, 'fileList'])
    ->name('files');

    Route::post('deleteFile', [AdminController::class, 'deleteFile'])
    ->name('deleteFile');

    Route::get('users', [AdminController::class, 'userList'])
    ->name('users');

    Route::get('addUsers', [AdminController::class, 'addUserForm'])
    ->name('addUser');

    Route::post('saveUser', [AdminController::class, 'saveUser'])
    ->name('saveUser');

    Route::match(['get', 'post'], 'changePassword', [AdminController::class, 'changePassword'])
    ->name('changePassword');

});

Auth::routes([
    'register' => false,
    'reset' => false,
]);

Route::post('ckeditor/upload', [CKEditorController::class, 'upload'])->name('ckeditor.upload');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
