<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginRegisterController;
use App\Http\Controllers\joueurController;
use App\Http\Controllers\equipeController;
use App\Http\Controllers\compititionController;
use App\Http\Controllers\playercompititionController;
use App\Http\Controllers\voterController;
use App\Http\Controllers\adminController;

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

Route::controller(LoginRegisterController::class)->group(function() {
    Route::get('/register', 'register')->name('register');
    Route::post('/store', 'store')->name('store');
    Route::get('/login', 'login')->name('login');
    Route::post('/authenticate', 'authenticate')->name('authenticate');
    Route::get('/dashboard', 'dashboard')->name('dashboard');
    Route::post('/logout', 'logout')->name('logout');
});

Auth::routes();
Route::controller(joueurController::class)->group(function() {
    Route::get('/formplayer', 'addplayer')->name('addplayer');
    Route::post('/playeradded', 'createplayer')->name('createplayer');
    Route::get('/playertable', 'afficheplayer')->name('afficheplayer');
    Route::get('/editplayer/{id}', 'edit')->name('updateformplayer');
    Route::post('/playerupdated/{id}', 'update')->name('updateplayer');
    Route::get('/deleteplayer/{id}', 'delete')->name('deleteplayer');
    
});
Auth::routes();
Route::controller(equipeController::class)->group(function() {

    Route::get('/formequipe', 'equipe')->name('equipe');
    Route::post('/equipeadded', 'addequipe')->name('addequipe');
    Route::get('/tableequipe', 'showtableequipe')->name('showtableequipe');
    Route::get('/editequipe/{id}', 'edit')->name('updateform');
    Route::post('/equipeupdated/{id}', 'update')->name('updateequipe');
    Route::get('/delete/{id}','delete')->name('delete');
    
});
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Auth::routes();
Route::controller(compititionController::class)->group(function() {

    Route::get('/formcompitition', 'formcompitition')->name('compitition');
    Route::post('/createcompitition', 'createcompitition')->name('createcompitition');
    Route::get('/showcompititiontable', 'showcompititiontable')->name('showcompititiontable');
    Route::get('/updateformcompitition/{id}', 'updateformcompitition')->name('updateformcompitition.get');
    Route::post('/updateformcompitition/{id}', 'updatecompitition')->name('updateformcompitition.post');
    Route::get('/deletecompitition/{id}','deletecompitition')->name('deletecompitition');
    Route::get('/calculatePlayerScores/{id}','calculatePlayerScores')->name('calculatePlayerScores');
Route::get('/activate-competition/{id}','activateCompetition')->name('activateCompetition');
Route::get('/deactivate-competition/{id}','deactivateCompetition')->name('deactivateCompetition');

});
Route::controller(voterController::class)->group(function() {
    Route::get('/registervoter', 'registervoter')->name('registervoter'); 
    Route::post('/addvoter', 'addvoter')->name('addvoter'); 
    Route::get('/voter', 'voter')->name('voter');
    Route::get('/success', 'success')->name('success');
    Route::get('/voted-for-competition/{competitionId}', 'votedForThisCompetition')->name('votedForThisCompetition');


    Route::get('/veuillezPatienterPage', 'veuillezPatienterPage')->name('veuillezPatienterPage');
    
});


