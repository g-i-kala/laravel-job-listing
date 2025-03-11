<?php

use App\Http\Controllers\JobController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegiesterUserController;
use App\Http\Controllers\SessionController;
use App\Jobs\TranslateJob;
use App\Models\Job;

Route::view('/','home');

Route::get('test', function() {
   $job = Job::first();
    TranslateJob::dispatch($job);

    return 'Done';
});

Route::get('/jobs',[JobController::class, 'index']);
Route::get('/jobs/create', [JobController::class, 'create']);
Route::get('/jobs/{job}', [JobController::class, 'show']);
Route::post('/jobs', [JobController::class, 'store'])
->middleware('auth');

Route::get('/jobs/{job}/edit', [JobController::class, 'edit'])
->middleware('auth')
->can('edit','job');

Route::patch('/jobs/{job}', [JobController::class, 'update'])
->middleware('auth')
->can('edit','job');

Route::delete('/jobs/{job}', [JobController::class, 'destroy'])
->middleware('auth')
->can('edit','job');

Route::view('/contact', 'contact');

//Auth
Route::get('/register', [RegiesterUserController::class, 'create']);
Route::post('/register', [RegiesterUserController::class, 'store']);

Route::get('/login', [SessionController::class, 'create'])->name('login');
Route::post('/login', [SessionController::class, 'store']);
Route::post('/logout', [SessionController::class, 'destroy_session']);

//for example when building an API
// Route::get('/about', function () {
//     return ['foo' => 'bar'];
// });ć