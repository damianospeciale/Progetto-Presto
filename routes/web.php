<?php

use App\Models\Announcement;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\AnnouncementController;
use App\Http\Controllers\RevisorController;

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

Route::get('/', [FrontController::class, 'home'])->name ('home');

Route::prefix('announcement')->group(function (){
    Route::get('/create', [AnnouncementController::class, 'create'])->name('announcement.create');
    Route::get('/index', [AnnouncementController::class, 'index'])->name('announcement.index');
    Route::get('/show/{announcement}', [AnnouncementController::class, 'show'])->name('announcement.show');

});

Route::get('/category/show/{category}', [FrontController::class, 'categoryShow'])->name('category.show');


// nome revisore
Route::get('/revisor/home', [RevisorController::class, 'index'])->middleware('isRevisor')->name('revisor.index');

// accetta annuncio
Route::patch('/accept/announcement/{announcement}', [RevisorController::class, 'acceptAnnouncement'])->middleware('isRevisor')->name('revisor.accept_announcement');

// rifiuta annuncio
Route::patch('/reject/announcement/{announcement}', [RevisorController::class, 'rejectAnnouncement'])->middleware('isRevisor')->name('revisor.reject_announcement');


// richiesta ruolo revisore
Route::post('/request/revisor',[RevisorController::class, 'becomeRevisor'])->middleware('auth')->name('become.revisor');

//rendi utente revisore
Route::get('/become/revisor/{user}', [RevisorController::class, 'makeRevisor'])->name('make.revisor');

//Form diventa revisore
Route::get('/revisor/form', [RevisorController::class, 'revisorForm'])->name('revisor.form');

// ricerca annuncio
Route::get('/reserch/announcement', [FrontController::class, 'searchAnnouncements'])->name('announcements.search');

// cambio linguaggio
Route::post('/language/{lang}', [FrontController::class, 'setLocale'])->name('setLocale');