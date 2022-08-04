<?php

use App\Http\Controllers\DiscussController;
use App\Http\Controllers\FormController;
use App\Http\Controllers\GameController;
use App\Http\Controllers\LangController;
use App\Http\Controllers\MailController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\SoftwareHouseController;

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

//Route::get('/', function () {
    //return view('index');
//});

Route::middleware('language')->group(function () {
    Route::get('/', [FrontController::class, 'getHome'])->name('home');

    Route::get('/user/login', [AuthController::class, 'authentication'])->name('user.login');
    Route::get('/user/register', [AuthController::class, 'join'])->name('user.register');
    Route::get('/user/logout', [AuthController::class, 'logout'])->name('user.logout');

    Route::post('/user/login', [AuthController::class, 'login'])->name('user.login');
    Route::post('/user/register', [AuthController::class, 'register'])->name('user.register');

    Route::get('/gioco/edit {game_id}', [GameController::class, 'edit'])->name('gioco.edit');
    Route::post('/gioco/store', [GameController::class, 'store'])->name('gioco.store');
    Route::post('/gioco/updater {game_id}', [GameController::class, 'updater'])->name('gioco.updater');
    Route::get('/gioco/confirm {game_id}', [GameController::class, 'confirm'])->name('gioco.confirm');
    Route::get('/gioco/delete {game_id}', [GameController::class, 'delete'])->name('gioco.delete');

    Route::get('/gioco/all', [GameController::class, 'all'])->name('gioco.all');

    Route::post('/software_house/updater {software_house_id}', [SoftwareHouseController::class, 'updater'])->name('software_house.updater');
    Route::get('/software_house/confirm_request {software_house_id}', [SoftwareHouseController::class, 'confirm_request'])->name('software_house.confirm_request');
    Route::get('/software_house/eliminate {software_house_id}', [SoftwareHouseController::class, 'eliminate'])->name('software_house.eliminate');

    Route::get('/stats/user', [FrontController::class, 'statsUser'])->name('stats.user');

    Route::get('/forum/index', [DiscussController::class, 'index'])->name('forum.index');
    Route::post('/forum/discuss/store', [DiscussController::class, 'storeDiscuss'])->name('forum.storeDiscussion');
    Route::get('/forum/discuss/posts {disc_id}', [DiscussController::class, 'postsDiscuss'])->name('forum.posts');
    Route::post('/forum/discuss/posts/create/store {disc_id}', [DiscussController::class, 'storePost'])->name('forum.storePost');
});

Route::middleware('authCustom', 'language')->group(function () {
    Route::resource('software_house', 'App\Http\Controllers\SoftwareHouseController') ;
    Route::get('/forum/discuss/create', [DiscussController::class, 'createDiscuss'])->name('forum.createDiscussion');
    Route::get('/forum/discuss/posts/create {disc_id}', [DiscussController::class, 'createPost'])->name('forum.createPost');

    Route::get('/gioco/index', [GameController::class, 'index'])->name('gioco.index');
    Route::get('/gioco/create', [GameController::class, 'create'])->name('gioco.create');

    Route::get('/ajaxSoftwareHouse', [SoftwareHouseController::class, 'ajaxCheckName'])->name('ajaxSoftwareHouse');
    Route::get('/user/ajaxCheckJoin', [AuthController::class, 'ajaxJoin'])->name('user.ajaxJoin');
    Route::get('/ajaxDiscuss', [DiscussController::class, 'ajaxDiscuss'])->name('ajaxDiscuss');
    Route::get('/ajaxLogin', [AuthController::class, 'ajaxLogin'])->name('ajaxLogin');

    Route::get('/sendmail', [MailController::class, 'sendMail']) -> name('send.mail');
    Route::get('sendbasicemail', [MailController::class, 'basic_email']) -> name('send.basic.email');
});

Route::get('/language {lang}', [LangController::class, 'changeLanguage'])->name('changeLanguage');








