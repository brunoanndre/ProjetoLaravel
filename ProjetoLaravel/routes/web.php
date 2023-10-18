<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EventController;
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

//Events Routes
Route::get('/', [EventController::class,'index']);

//Create a new event
Route::get('/events/create', [EventController::class,'create'])->middleware('auth');
Route::post('/events',[EventController::class,'store']);

//Event page
Route::get('/events/{id}',[EventController::class,'show']);

//User Events
Route::get('/dashboard',[EventController::class,'dashboard'])->middleware('auth');

//Delete events
Route::delete('/events/{id}',[EventController::class,'destroy'])->middleware('auth');

//Edit events
Route::get('/events/edit/{id}',[EventController::class,'edit'])->middleware('auth');
Route::put('/events/update/{id}',[EventController::class,'update'])->middleware('auth');

//join event
Route::post('/events/join/{id}',[EventController::class,'joinEvent'])->middleware('auth');

//Leave event
Route::delete('/events/leave/{id}',[EventController::class,'leaveEvent'])->middleware('auth');

/*Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});*/
