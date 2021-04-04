<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Route;


Route::get('/', [HomeController::class ,'main']);
 
Route::get('topik/{topic}', [TopicController::Class, 'main']);

Route::get('search', [SearchResults\SearchController::class, 'main']);
Route::get('search/user', [SearchResults\UserController::class, 'main']);
Route::get('search/thread', [SearchResults\ThreadController::class, 'main']);

Route::get('/thread/{id}', [Threads\DetailController::class, 'main']);

Route::get('user/{id}', [Users\ProfileController::class, 'main']);

Route::middleware(['auth'])->group(function () {
    Route::get('create/thread', [Threads\CreateThreadController::class, 'main']);
    Route::post('store/thread', [Threads\StoreController::class, 'main']);
    Route::get('edit/thread', [Threads\EditController::class, 'main']);
    Route::put('update/thread', [Threads\UpdateController::class, 'main']);
    Route::delete('delete/thread', [Threads\DeleteController::class, 'main']);  
    Route::get('followed-thread', [Threads\FollowedController::class, 'main']);

    Route::get('setting/user', [Users\SettingController::class, 'main']);
    
    Route::post('store/comment', [Comment\StoreController::class, 'main']);
    Route::get('edit/comment', [Comment\EditController::class, 'main']);
    Route::put('update/comment', [Comment\UpdateController::class, 'main']);
    Route::delete('delete/comment', [Comment\DeleteController::class, 'main']);

    Route::post('create/reply-answer', [ReplyAnswer\StoreController::class, 'main']);
    Route::delete('delete/reply-answer', [ReplyAnswer\DeleteController::class, 'main']);

    Route::get('notification', [NotificationController::class, 'main']);
});

Route::middleware(['admin'])->group(function () {
    Route::get('admin', [Admin\HomeController::class, 'main']);

    Route::get('admin/report/thread', [Admin\Report\Thread\ShowController::class, 'main']);
    Route::get('admin/report/thread/detail', [Admin\Report\Thread\DetailController::class, 'main']);
    Route::delete('admin/report/thread/ignore', [Admin\Report\Thread\IgnoreController::class, 'main']);
    Route::delete('admin/report/thread/delete', [Admin\Report\Thread\DeleteController::class, 'main']);

    Route::get('admin/report/comment', [Admin\Report\Comment\ShowController::class, 'main']);
    Route::get('admin/report/comment/detail', [Admin\Report\Comment\DetailController::class, 'main']);
    Route::delete('admin/report/comment/ignore', [Admin\Report\Comment\IgnoreController::class, 'main']);
    Route::delete('admin/report/comment/delete', [Admin\Report\Comment\DeleteController::class, 'main']);

    Route::get('admin/report/reply-comment', [Admin\Report\ReplyComment\ShowController::class, 'main']);
    Route::get('admin/report/reply-comment/detail', [Admin\Report\ReplyComment\DetailController::class, 'main']);
    Route::delete('admin/report/reply-comment/ignore', [Admin\Report\ReplyComment\IgnoreController::class, 'main']);
    Route::delete('admin/report/reply-comment/delete', [Admin\Report\ReplyComment\DeleteController::class, 'main']);   
});


/*
Route::get('/dashboard', function () {
    return abort(404);
})->middleware(['auth'])->name('dashboard');
*/

require __DIR__.'/auth.php';