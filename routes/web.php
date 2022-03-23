<?php

// -------- Admin Controllers --------
use App\Http\Controllers\Admin\AcceptController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\MessageController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\ResourceController;
use App\Http\Controllers\Admin\ResourceTypeController;
use App\Http\Controllers\Admin\SpecialistController;
use App\Http\Controllers\Admin\UserController;

// -------- Site Controllers --------
use App\Http\Controllers\CkeditorController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\RezumeController;
use App\Http\Controllers\VacancyController;
use Illuminate\Support\Facades\Route;

// -------- Admin Controllers --------

Route::get('/getCities/{region_id}', [App\Http\Controllers\DataController::class, 'getCities'])->name('getCities');


//Route::middleware(['auth'])->group(function () {
//
//    Route::resource('answers', AnswerController::class);
//    Route::resource('questions', QuestionController::class);
//    Route::resource('comments', CommentController::class);
//
//// moderator
//    Route::post('company/{id}', [App\Http\Controllers\ModeratorController::class, 'companyCheck'])->name('companies.check');
//    Route::post('vacancy/{id}', [App\Http\Controllers\ModeratorController::class, 'vacancyCheck'])->name('vacancies.check');
//    Route::post('citizen/{id}', [App\Http\Controllers\ModeratorController::class, 'citizenCheck'])->name('citizens.check');
//    Route::post('rezume/{id}', [App\Http\Controllers\ModeratorController::class, 'rezumeCheck'])->name('rezumes.check');
//
//
//// admin
//
//
//    Route::resource('instruments', InstrumentController::class);
//    Route::resource('resources', ResourceController::class);
//    Route::resource('resumes', RezumeController::class);
//
//
//// company
//
//    Route::get('companies/status/{status}', [App\Http\Controllers\CompanyController::class, 'index'])->name('companies.status');
//    Route::resource('companies', CompanyController::class);
//    Route::resource('vacancies', VacancyController::class);
//
//// citizen
//
//    Route::get('citizens/status/{status}', [App\Http\Controllers\CitizenController::class, 'index'])->name('citizens.status');
//    Route::resource('citizens', CitizenController::class);
//    Route::resource('rezumes', RezumeController::class);
//});

Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'check-moderator']], function () {

    Route::get('/home', [DashboardController::class, 'home'])->name('admin.home');

    Route::get('/messages', [MessageController::class, 'index'])->name('admin.messages');
    Route::get('/messages/{id}', [MessageController::class, 'details'])->name('admin.message_details');

    Route::get('/users', [UserController::class, 'index'])->name('admin.users');
    Route::get('/users/{user}/info', [UserController::class, 'info'])->name('admin.user_info');
    Route::get('/users/{user}/accept', [UserController::class, 'accept'])->name('admin.user_accept');
    Route::get('/users/{user}/delete', [UserController::class, 'delete'])->name('admin.user_delete');
    Route::get('/users/{user}/makemoderator', [UserController::class, 'makemoderator'])->name('admin.user_makemoderator');
    Route::get('/users/{user}/makecitizen', [UserController::class, 'makecitizen'])->name('admin.user_makecitizen');

    Route::get('/acceptvacancies/{vacancy?}', [AcceptController::class, 'accept_vacancy'])->name('admin.accept_vacancy');
    Route::get('/accept/vacancies', [AcceptController::class, 'vacancies'])->name('admin.acceptable_vacancies');
    Route::get('/accept/vacancy/{vacancy?}', [AcceptController::class, 'vacancy'])->name('admin.acceptable_vacancy');

    Route::resources([
        'category' => CategoryController::class,
        'post' => PostController::class,
        'specialist' => SpecialistController::class,
        'resource_type' => ResourceTypeController::class,
        'resource' => ResourceController::class,
    ]);
});

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::post('ckeditor/upload', [CkeditorController::class, 'upload'])->name('ckeditor_image_upload');
Route::get('/news', [NewsController::class, 'index'])->name('news');
Route::get('/news/{slug}/details', [NewsController::class, 'details'])->name('news_details');
Route::get('/contact', [ContactController::class, 'index'])->name('contact');
Route::post('/contact', [ContactController::class, 'contact'])->name('post_contact');

Route::get('/register', [RegisterController::class, 'register'])->name('register');
Route::post('/register', [RegisterController::class, 'post_register'])->name('post_register');

Route::get('/login', [RegisterController::class, 'login'])->name('login');
Route::post('/post_login', [RegisterController::class, 'post_login'])->name('post_login');

Route::post('/logout', [RegisterController::class, 'logout'])->name('logout');

Route::get('/rezumes', [RezumeController::class, 'rezumes'])->name('rezumes');
Route::get('/rezumes/{rezume}/details', [RezumeController::class, 'rezume_details'])->name('rezume_details');
Route::get('/vacancies/{id?}', [VacancyController::class, 'vacancies'])->name('vacancies');
Route::get('/vacancy/{vacancy}/details', [VacancyController::class, 'vacancy_details'])->name('vacancy_details');

Route::get('/users/profile/rezumes', [ProfileController::class, 'user'])->name('profile');

Route::get('/users/profile/rezumes', [ProfileController::class, 'user'])->name('user_profile');
Route::get('/users/profile/addrezume', [ProfileController::class, 'addrezume'])->name('user_add_rezume');
Route::post('/users/postrezume/profile', [ProfileController::class, 'postrezume'])->name('user_post_rezume');
Route::delete('/users/deleterezume/profile', [ProfileController::class, 'deleterezume'])->name('user_delete_rezume');

Route::get('/resources/{slug}/details', [HomeController::class, 'resource_details'])->name('resource_details');
Route::get('/resources/{slug}', [HomeController::class, 'resources'])->name('resources');

Route::resource('vacancy', VacancyController::class);

