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
use App\Http\Controllers\ModeratorController;

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
    return view('template.index');
})->name('template.index');

Route::get('/getCities/{region_id}', [App\Http\Controllers\DataController::class, 'getCities'])->name('getCities');


Route::middleware(['auth'])->group(function(){
    
    Route::resource('answers', AnswerController::class);
    Route::resource('questions', QuestionController::class);
    Route::resource('comments', CommentController::class);
    
// moderator
    Route::post('company/{id}', [App\Http\Controllers\ModeratorController::class, 'companyCheck'])->name('companies.check');
    Route::post('vacancy/{id}', [App\Http\Controllers\ModeratorController::class, 'vacancyCheck'])->name('vacancies.check');
    Route::post('citizen/{id}', [App\Http\Controllers\ModeratorController::class, 'citizenCheck'])->name('citizens.check');
    Route::post('rezume/{id}', [App\Http\Controllers\ModeratorController::class, 'rezumeCheck'])->name('rezumes.check');


// admin


    Route::resource('instruments', InstrumentController::class);
    Route::resource('news', NewsController::class);
    Route::resource('resources', ResourceController::class);
    Route::resource('resumes', RezumeController::class);


// company

    Route::resource('companies', CompanyController::class);
    Route::resource('vacancies', VacancyController::class);

// citizen

    Route::resource('citizens', CitizenController::class);
    Route::resource('rezumes', RezumeController::class);
});

Auth::routes();