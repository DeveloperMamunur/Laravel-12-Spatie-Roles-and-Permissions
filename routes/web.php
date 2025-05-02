<?php

use App\Livewire\Products\ProductCreate;
use App\Livewire\Products\ProductEdit;
use App\Livewire\Products\ProductIndex;
use App\Livewire\Products\ProductShow;
use App\Livewire\Roles\RoleCreate;
use App\Livewire\Roles\RoleEdit;
use App\Livewire\Roles\RoleIndex;
use App\Livewire\Roles\RoleShow;
use App\Livewire\Settings\Appearance;
use App\Livewire\Settings\Password;
use App\Livewire\Settings\Profile;
use App\Livewire\Users\UserCreate;
use App\Livewire\Users\UserEdit;
use App\Livewire\Users\UserIndex;
use App\Livewire\Users\UserShow;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware(['auth'])->group(function () {
    Route::redirect('settings', 'settings/profile');

    // users routes here
    Route::get('users', UserIndex::class)->name('users.index')->middleware("permission:user.view|user.create|user.edit|user.delete");
    Route::get('users/create', UserCreate::class)->name('users.create')->middleware("permission:user.create");
    Route::get('users/{id}/edit', UserEdit::class)->name('users.edit')->middleware("permission:user.edit");
    Route::get('users/{id}', UserShow::class)->name('users.show')->middleware("permission:user.view");

    // products routes here
    Route::get('products', ProductIndex::class)->name('products.index')->middleware("permission:product.view|product.create|product.edit|product.delete");
    Route::get('products/create', ProductCreate::class)->name('products.create')->middleware("permission:product.create");
    Route::get('products/{id}/edit', ProductEdit::class)->name('products.edit')->middleware("permission:product.edit");
    Route::get('products/{id}', ProductShow::class)->name('products.show')->middleware("permission:product.view");

    // Role routes here
    Route::get('roles', RoleIndex::class)->name('roles.index')->middleware("permission:role.view|role.create|role.edit|role.delete");
    Route::get('roles/create', RoleCreate::class)->name('roles.create')->middleware("permission:role.create");
    Route::get('roles/{id}/edit', RoleEdit::class)->name('roles.edit')->middleware("permission:role.edit");
    Route::get('roles/{id}', RoleShow::class)->name('roles.show')->middleware("permission:role.view");

    // settings profile routes here
    Route::get('settings/profile', Profile::class)->name('settings.profile');
    Route::get('settings/password', Password::class)->name('settings.password');
    Route::get('settings/appearance', Appearance::class)->name('settings.appearance');
});

require __DIR__ . '/auth.php';
