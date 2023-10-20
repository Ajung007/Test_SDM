<?php

use App\Http\Controllers\AnswerController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\TesController;
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


Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified',])->group(function () {

    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');



    Route::group(['prefix' => 'sdm'], function () {
        // Dashboard
        Route::get('/', [DashboardController::class, 'index'])->name('sdm.index');

        // Kategori
        Route::get('/kategori', [KategoriController::class, 'kategori'])->name('sdm.kategori');
        Route::get('/kategori/add', [KategoriController::class, 'add'])->name('sdm.add.kategori');
        Route::post('/kategori/add', [KategoriController::class, 'post'])->name('sdm.post.kategori');
        Route::get('/kategori/show/{id}', [KategoriController::class, 'show'])->name('sdm.show.kategori');
        Route::post('/kategori/update/{id}', [KategoriController::class, 'update'])->name('sdm.update.kategori');


        // Question
        Route::get('/question', [QuestionController::class, 'question'])->name('sdm.question');
        Route::get('/question/add', [QuestionController::class, 'add'])->name('sdm.add.question');
        Route::post('/question/add', [QuestionController::class, 'post'])->name('sdm.post.question');
        Route::get('/question/edit/{id}', [QuestionController::class, 'edit'])->name('sdm.edit.question');
        Route::post('/question/edit/{id}', [QuestionController::class, 'update'])->name('sdm.update.question');

        // Answer
        Route::get('/answer/{id}', [AnswerController::class, 'answer'])->name('sdm.answer');
        Route::post('/answer/{id}', [AnswerController::class, 'post'])->name('sdm.post.answer');
        Route::post('/answer/update/{id}', [AnswerController::class, 'update'])->name('sdm.update.answer');
    });


});
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/tes',[TesController::class,'index'])->name('tes.index');