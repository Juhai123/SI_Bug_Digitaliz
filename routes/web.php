<?php

use App\Http\Controllers\Admin\BugController;
use App\Http\Controllers\Admin\BugWlkingController;
use App\Http\Controllers\Admin\HistoryController;
use App\Http\Controllers\Admin\InstansiController;
use App\Http\Controllers\Admin\ManajemenUserController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\ProgrammerController;
use App\Http\Controllers\Admin\ProjectController;
use App\Http\Controllers\Admin\TaskController;
use App\Http\Controllers\Admin\VerificationbugController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\PICController;
use App\Http\Controllers\PICProject\BugController as PICProjectBugController;
use App\Http\Controllers\PICProject\ProfilePICController;
use App\Http\Controllers\PICProject\ProjectController as PICProjectProjectController;
use App\Http\Controllers\Programmer\History1Controller;
use App\Http\Controllers\Programmer\HistoryTaskProgrammer;
use App\Http\Controllers\Programmer\ProfileProgrammerController;
use App\Http\Controllers\Programmer\TaskProgrammer;
use App\Http\Controllers\ProgrammerController as ControllersProgrammerController;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();

Route::middleware('role:admin')->name('admin.')->prefix('admin')->group(function(){
    Route::get('/', [AdminController::class, 'index'])->name('index');
    Route::get('markNotification', [AdminController::class, 'markAsRead'])->name('markNotification');
    Route::resource('bug', BugController::class);
    Route::resource('task', TaskController::class);
    Route::patch('/verification/{id}', [TaskController::class, 'updateVerification'])->name('verification.update');
    Route::resource('project', ProjectController::class);
    Route::resource('instansi', InstansiController::class);
    Route::resource('programmer', ProgrammerController::class);
    Route::resource('user', ManajemenUserController::class);
    Route::resource('bugs_walking', BugWlkingController::class);
    Route::patch('/verification/{id}', [VerificationbugController::class, 'updateVerification'])->name('bugs_walking.verification.update');
    // updateVerification->controller, name->view
    Route::resource('history', HistoryController::class);
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile.index');
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::post('/profile/update', [ProfileController::class, 'update'])->name('profile.update');
    Route::post('/changePassword', [ProfileController::class, 'changePassword'])->name('profile.password.update');
    
});
    Route::middleware('role:pic_project')->name('pic.')->prefix('pic')->group(function(){
    Route::get('/', [PICController::class, 'index'])->name('index');
    Route::resource('bug', PICProjectBugController::class);
    Route::resource('project', PICProjectProjectController::class);
    Route::get('/profile', [ProfilePICController::class, 'index'])->name('profile.index');
    Route::get('/profile/edit', [ProfilePICController::class, 'edit'])->name('profile.edit');
    Route::post('/profile/update', [ProfilePICController::class, 'update'])->name('profile.update');
    Route::post('/changePassword', [ProfilePICController::class, 'changePassword'])->name('profile.password.update');
        });

    Route::middleware('role:programmer')->name('programmer.')->prefix('programmer')->group(function(){
    Route::get('/', [ControllersProgrammerController::class, 'index'])->name('index');
    Route::get('/notif', [ControllersProgrammerController::class, 'indexNotif'])->name('notif.index');
    Route::get('markNotification', [ControllersProgrammerController::class, 'markAsRead'])->name('markNotification');
    Route::resource('task', TaskProgrammer::class);
    Route::resource('historytask', HistoryTaskProgrammer::class);
    Route::post('/coba/{id}', [History1Controller::class, 'show'])->name('coba.show');
    Route::get('/profile', [ProfileProgrammerController::class, 'index'])->name('profile.index');
    Route::get('/profile/edit', [ProfileProgrammerController::class, 'edit'])->name('profile.edit');
    Route::post('/profile/update', [ProfileProgrammerController::class, 'update'])->name('profile.update');
    Route::post('/changePassword', [ProfileProgrammerController::class, 'changePassword'])->name('profile.password.update');
    
            });

    