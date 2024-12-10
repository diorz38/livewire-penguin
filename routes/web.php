<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
    Route::group(['middleware' => ['role:super-admin|admin']], function () {
        Route::get('/user-management/users', App\Livewire\UserManagement\Index::class)->name('user-management.users.index');
        Route::get('/user-management/permissions', App\Livewire\PermissionManagement\Index::class)->name('user-management.permissions.index');
    });
    Route::get('/user-management/users/test', App\Livewire\UserManagement\Test::class)->name('user-management.users.test');

});
