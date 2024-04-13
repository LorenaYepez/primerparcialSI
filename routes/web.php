<?php

use App\Http\Controllers\Backend\AdminController;
use App\Http\Controllers\Backend\AdminProfileController;
use App\Http\Controllers\Backend\AdminTareaController;
use App\Http\Controllers\Backend\AdminActividadController;
use App\Http\Controllers\Backend\VendorController;
use App\Http\Controllers\Backend\UserController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/







//Route::get('/admin/tarea', [AdminTareaController::class, 'index'])->name('admin.tarea');



Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::get('/admin/profile', [AdminProfileController::class, 'index'])->name('admin.profile');

    Route::get('/admin/tarea', [AdminTareaController::class, 'index'])->name('admin.tarea'); 
    Route::get('/admin/tarea/vistacrear', [AdminTareaController::class, 'vistacrear'])->name('admin.tarea.crear');
    Route::post('/admin/tarea/crear', [AdminTareaController::class, 'crear'])->name('admin.tarea.crear');
    Route::get('/admin/tarea/vistaeditar/{id}', [AdminTareaController::class, 'vistaeditar'])->name('admin.tarea.crear');
    Route::post('/admin/tarea/editar', [AdminTareaController::class, 'editar'])->name('admin.tarea.editar');
    
    Route::get('/admin/actividad', [AdminActividadController::class, 'index'])->name('admin.actividad');
    Route::get('/admin/actividad/vistacrear', [AdminActividadController::class, 'vistacrear'])->name('admin.actividad.crear');
    Route::post('/admin/actividad/crear', [AdminActividadController::class, 'crear'])->name('admin.actividad.crear');

    Route::post('/admin/profile/update', [AdminProfileController::class, 'updateProfile'])->name('admin.profile.update');
    Route::post('/admin/profile/update/password', [AdminProfileController::class, 'updatePassword'])->name('admin.password.update');

});
/*

Route::middleware(['auth', 'role:vendor'])->group(function () {
    Route::get('/vendor/dashboard', [VendorController::class, 'dashboard'])->name('vendor.dashboard');
});


Route::middleware(['auth', 'role:user'])->group(function () {
    Route::get('/user/dashboard', [UserController::class, 'dashboard'])->name('user.dashboard');
});
*/

Route::get('admin/login', [AdminController::class, 'login'])->name('admin.login');
