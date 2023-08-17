<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\Auth\AuthController;
use App\Http\Controllers\API\JobsController;
use App\Http\Controllers\UserController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});



Route::middleware(['auth:sanctum'])->group(function () {
    Route::get('/users', [UserController::class, 'index']);
  });


Route::group(['middleware' => 'auth:sanctum'], function () {

    //Upload Images/////////////////////////////////////////////////////////////////////
    Route::post('/uploadimages', [JobsController::class, 'uploadimages']);


    Route::post('/signout', [AuthController::class, 'signout']);
    // get all jobs
    Route::get('/jobs', [JobsController::class, 'index']);
    //get ongoing jobs
    Route::get('/jobsongoing', [JobsController::class, 'jobsongoing']);
    //get furtheraction jobs
    Route::get('/jobsfurtheraction', [JobsController::class, 'jobsfurtheraction']);
    //get complete jobs
    Route::get('/jobscomplete', [JobsController::class, 'jobscomplete']);

    Route::get('/jobs/paid',[JobController::class, 'getpaidJobs'])->name('jobs.paid');
    
    Route::get('/jobs/{id}', [JobsController::class, 'show']);
    Route::post('/jobs/{id}', [JobsController::class, 'updateStatus']);
    

    //Lift Test sheets/////////////////////////////////////////////////////////////////////
    Route::get('/jobs/{id}/lifttestsheets', [JobsController::class, 'lifttestsheets']);
    Route::get('/lifttestsheet/{id}', [JobsController::class, 'lifttestsheet']);
    Route::post('/updatelifttestsheet/{id}', [JobsController::class, 'updatelifttestsheet']);
    Route::post('/addlifttestsheet', [JobsController::class, 'addlifttestsheet']);

    //engineer control sheets/////////////////////////////////////////////////////////////////////
    Route::get('/jobs/{id}/engineercontrolsheets', [JobsController::class, 'engineercontrolsheets']);
    Route::get('/engineercontrolsheet/{id}', [JobsController::class, 'engineercontrolsheet']);
    Route::post('/updateengineercontrolsheet/{id}', [JobsController::class, 'updateengineercontrolsheet']);
    Route::post('/addengineercontrolsheet', [JobsController::class, 'addengineercontrolsheet']);

    //Lift Various sheets/////////////////////////////////////////////////////////////////////
    Route::get('/jobs/{id}/liftvariousheets', [JobsController::class, 'liftvariousheets']);
    Route::get('/liftvarioussheet/{id}', [JobsController::class, 'liftvarioussheet']);
    Route::post('/updateliftvarioussheet/{id}', [JobsController::class, 'updateliftvarioussheet']);
    Route::post('/addliftvarioussheet', [JobsController::class, 'addliftvarioussheet']);

    //Winch Test sheets/////////////////////////////////////////////////////////////////////
    Route::get('/jobs/{id}/winchtestsheets', [JobsController::class, 'winchtestsheets']);
    Route::get('/winchtestsheet/{id}', [JobsController::class, 'winchtestsheet']);
    Route::post('/updatewinchtestsheet/{id}', [JobsController::class, 'updatewinchtestsheet']);
    Route::post('/addwinchtestsheet', [JobsController::class, 'addwinchtestsheet']);

    //Crane Test sheets/////////////////////////////////////////////////////////////////////
    Route::get('/jobs/{id}/cranetestsheets', [JobsController::class, 'cranetestsheets']);
    Route::get('/cranetestsheet/{id}', [JobsController::class, 'cranetestsheet']);
    Route::post('/updatecranetestsheet/{id}', [JobsController::class, 'updatecranetestsheet']);
    Route::post('/addcranetestsheet', [JobsController::class, 'addcranetestsheet']);

    //Thourough Test sheets/////////////////////////////////////////////////////////////////////
    Route::get('/jobs/{id}/thouroughtestsheets', [JobsController::class, 'thouroughtestsheets']);
    Route::get('/thouroughtestsheet/{id}', [JobsController::class, 'thouroughtestsheet']);
    Route::post('/updatethouroughtestsheet/{id}', [JobsController::class, 'updatethouroughtestsheet']);
    Route::post('/addthouroughtestsheet', [JobsController::class, 'addthouroughtestsheet']);
    
});

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/login', [AuthController::class, 'login']);
// Route::post('/signout', [AuthController::class, 'signout']);


