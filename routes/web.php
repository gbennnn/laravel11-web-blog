<?php

use App\Http\Controllers\Front\HomepageController;
use App\Http\Controllers\Member\BlogController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomepageController::class, 'index']);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Blog Route
    // Route::get('/member/blogs', [BlogController::class, 'index']);
    // Route::get('/member/blogs/{post}/edit', [BlogController::class, 'edit']);

    Route::resource('member/blogs', BlogController::class)->names([
        'index'   => 'member.blogs.index',
        'create'  => 'member.blogs.create',
        'store'   => 'member.blogs.store',
        'show'    => 'member.blogs.show',
        'edit'    => 'member.blogs.edit',
        'update'  => 'member.blogs.update',
        'destroy' => 'member.blogs.destroy',
    ])->parameters([
        'blogs' => 'post',
    ]); // This will create all the routes for the BlogController
});

require __DIR__ . '/auth.php';

Route::get('/{slug}');
