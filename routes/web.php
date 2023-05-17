<?php

declare(strict_types=1);

use App\Http\Controllers\Admin\ArticleController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\FileController;
use App\Http\Controllers\Admin\SubsiteController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\CKEditorController;
use App\Http\Controllers\MainController;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;


Route::get('/', [MainController::class, 'index'])
    ->name('mainpage');

    Route::get('/clear-cache', function() {
        Artisan::call('cache:clear');
        Artisan::call('key:generate');
        Artisan::call('config:cache');
        Artisan::call('view:clear');
        return "Cleared!";
    });

    Route::get('/link', function() {
        Artisan::call('storage:link');
        return "Cleared!";
    });


//SUBSITE ROUTING
Route::get('subsite/{subsite}', [MainController::class, 'index'])
    ->name('subsite');


Route::group([
    'prefix' => 'administrator',
    'namespace' => 'Admin',
    'as' => 'admin.',
    'middleware' => ['auth'],
], function () {

    Route::get('', [AdminController::class, 'index'])
        ->name('mainpage');

    //SUBSITES CONTROL:
    Route::group([], function () {

        Route::get('subsites', [SubsiteController::class, 'get'])
            ->name('subsites');

        Route::get('addOrEditSubsite', [SubsiteController::class, 'addOrEdit'])
            ->name('addOrEditSubsiteForm');

        Route::post('saveSubsite', [SubsiteController::class, 'save'])
            ->name('saveSubsite');

        Route::post('deleteSubsite', [SubsiteController::class, 'delete'])
            ->name('deleteSubsite');
    });


    //ARTICLES CONTROL:
    Route::group([], function () {

        Route::get('articles', [ArticleController::class, 'get'])
            ->name('articles');

        Route::get('addOrEditArticle', [ArticleController::class, 'addOrEdit'])
            ->name('addOrEditArticleForm');

        Route::post('saveArticle', [ArticleController::class, 'save'])
            ->name('saveArticle');

        Route::post('deleteArticle', [ArticleController::class, 'delete'])
            ->name('deleteArticle');
    });

    //FILES CONTROL:
    Route::group([], function () {
        Route::get('files', [FileController::class, 'list'])
            ->name('files');

        Route::post('deleteFile', [FileController::class, 'delete'])
            ->name('deleteFile');
    });

    //USER CONTROL:
    Route::group([], function () {

        Route::get('users', [UserController::class, 'list'])
            ->name('users');

        Route::get('addUsers', [UserController::class, 'add'])
            ->name('addUser');

        Route::post('saveUser', [UserController::class, 'save'])
            ->name('saveUser');

        Route::match(['get', 'post'], 'changePassword', [UserController::class, 'changePassword'])
            ->name('changePassword');
    });

    //Contact data control:
    Route::match(['get', 'post'], 'contact', [AdminController::class, 'contact'])
    ->name('contactData');



    // Route::get('contact', ['])
    //     ->name('contactData');

    // Route::post('contact', [AdminController::class, 'contact'])
    //     ->name('saveContactData');
});

Auth::routes([
    'register' => false,
    'reset' => false,
]);

Route::post('ckeditor/upload', [CKEditorController::class, 'upload'])->name('ckeditor.upload');



