<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\AdminController;
Use App\Http\Controllers\UserController;
use App\Http\Controllers\DonorDarahController;
use App\Models\DonorDarah;

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

Route::get('/donor_darah', [DonorDarahController::class, 'index']);
Route::post('/daftar_donor_darah', [DonorDarahController::class, 'store']);

// Super User Access
Route::prefix('su_admin')
        ->middleware('auth','superuser')
        ->group(function(){
            // users
            Route::get('/users', [AdminController::class, 'users']);
            Route::get('/add_user', [AdminController::class, 'add_user']);
            Route::post('/store_user', [AdminController::class, 'store_user']);
            Route::delete('/delete_user/{user}', [AdminController::class, 'delete_user']);
            // settings
            Route::get('/pengaturan_web', [AdminController::class, 'settings']);
            Route::patch('/edit-event', [AdminController::class, 'edit_event']);
            Route::delete('/delete_event/{event}', [AdminController::class, 'delete_event']);
            //timeline
            Route::get('/pengaturan_web/timeline', [AdminController::class, 'timeline']);
            Route::get('/get_timeline/{id}', [AdminController::class, 'get_timeline']);
            Route::post('/pengaturan_web/timeline/add_timeline', [AdminController::class, 'add_timeline']);
            Route::patch('/pengaturan_web/timeline/edit_timeline', [AdminController::class, 'edit_timeline']);
            Route::delete('/pengaturan_web/timeline/delete_timeline/{timeline}', [AdminController::class, 'delete_timeline']);
        });

// Super User & Staff Access
Route::prefix('su_admin')
        ->middleware('auth','admin')
        ->group(function(){
            Route::get('/dashboard', [AdminController::class, 'dashboard']);
            // donor darah
            Route::get('/donor_darah', [AdminController::class, 'index_donor_darah']);
            Route::get('/donor_darah/detail/{donor_darah}', [AdminController::class, 'detail_donor_darah']);
            Route::get('/donor_darah/export', [AdminController::class, 'export_donor_darah']);
            // event
            Route::get('/{event}', [AdminController::class, 'index_event']);
            Route::get('/{event}/{filter}', [AdminController::class, 'filter_index']);
            Route::get('/{event}/team/{team_id}', [AdminController::class, 'detail_team']);
            // profil
            Route::get('/profil', [AdminController::class, 'profil']);
            Route::patch('/edit_profil', [AdminController::class, 'edit_profil']);
            Route::patch('/change_password', [AdminController::class, 'change_password']);
            // verifikasi data
            Route::get('/{event}/team/{type}/{team_id}', [AdminController::class, 'verifikasi_data']);
            Route::delete('/{event}/team/{team_id}/delete_task/{task_id}', [AdminController::class, 'delete_task']);
        });

// User & Guest Access
Route::prefix('user')
        ->middleware('auth','user', 'verified')
        ->group(function(){
            Route::get('/dashboard', [UserController::class, 'dashboard']);
            // event
            Route::get('/events', [UserController::class, 'events']);
            Route::get('/events/{event}', [UserController::class, 'detail_event']);
            Route::post('/events/{event}/registed_team', [UserController::class, 'regist_team']);
            Route::get('/events/{event}/success_regist', [UserController::class, 'success_regist']);
            // info
            
            // regis event
            Route::get('/regis_event', [UserController::class, 'regis_event']);
            Route::get('/regis_event/{event}/detail_tim', [UserController::class, 'detail_team']);
            Route::post('/regis_event/{event}/add_team_member', [UserController::class, 'add_member']);
            Route::post('/regis_event/{event}/upload_task', [UserController::class, 'upload_task']);
            Route::delete('/regis_event/{event}/delete_task_tmp', [UserController::class, 'delete_task_tmp']);
            Route::post('/regis_event/{event}/save_task', [UserController::class, 'save_task']);
            Route::delete('/regis_event/{event}/delete_task', [UserController::class, 'delete_task']);
            Route::post('/regis_event/{event}/request/verif', [UserController::class, 'request_verif']);
            // profil
            Route::get('/profil', [UserController::class, 'profil']);
            Route::patch('/edit_profil', [UserController::class, 'edit_profil']);
            Route::patch('/change_password', [UserController::class, 'change_password']);
        });

require __DIR__.'/auth.php';
