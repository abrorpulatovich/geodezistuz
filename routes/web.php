<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\CitizenController;
use App\Http\Controllers\AnswerController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\InstrumentController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\ResourceController;
use App\Http\Controllers\RezumeController;
use App\Http\Controllers\VacancyController;
use App\Http\Controllers\DataController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/getCities/{region_id}', [App\Http\Controllers\DataController::class, 'getCities'])->name('getCities');

Auth::routes();

    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    Route::resource('answers', AnswerController::class);
    Route::resource('questions', QuestionController::class);
    Route::resource('comments', CommentController::class);
    Route::resource('vacancies', VacancyController::class);
    


// admin

Route::group([
    'middleware' => ['auth', 'role:admin'],
], function() {
    Route::resource('companies', CompanyController::class);
    Route::resource('citizens', CitizenController::class);
    Route::resource('instruments', InstrumentController::class);
    Route::resource('news', NewsController::class);
    Route::resource('resources', ResourceController::class);
    Route::resource('resumes', RezumeController::class);
});

// company

Route::group([
    'middleware' => ['auth', 'role:company'],
], function() {
    Route::resource('companies', CompanyController::class);
});

// citizen

Route::group([
    'middleware' => ['auth', 'role:citizen'],
], function() {
    Route::resource('citizens', CitizenController::class);
    Route::resource('rezumes', RezumeController::class);
});