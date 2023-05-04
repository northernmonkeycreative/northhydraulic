<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\NoaccessController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\EngineerController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\JobController;
use App\Http\Controllers\HolidayController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\EngineercontrolsheetController;
use App\Http\Controllers\LifttestcertificatesheetController;
use App\Http\Controllers\WinchtestcertificatesheetController;
use App\Http\Controllers\LiftingVariouscertificatesheetController;
use App\Http\Controllers\ThouroughinspectionsheetController;
use App\Http\Controllers\CranetestcertificatesheetController;

use App\Http\Middleware\isAdmin;

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
    return view('auth.login');
});

// No Access
Route::get('/noaccess', NoaccessController::class)->name('noaccess');
Route::middleware(['auth', isAdmin::class])->group(function ()
 {
        // Main Dashboard
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
        Route::get('/dashboard-workshop', [DashboardController::class, 'workshop'])->name('dashboard-workshop');
        Route::post('calendar-crud-ajax', [DashboardController::class, 'calendarEvents'])->name('calendarEvents');
        

        // Users
        Route::get('/users',[UserController::class, 'index'])->name('users');
        Route::get('/users-new',[UserController::class, 'create'])->name('users.new');
        Route::post('/users',[UserController::class, 'store'])->name('users.store');
        Route::post('/users/{id}',[UserController::class, 'update'])->name('users.update');
        Route::delete('/users/{user}',[UserController::class, 'destroy'])->name('users.destroy');
        Route::patch('/users/{id}',[UserController::class, 'restore'])->name('users.restore');
        Route::get('/users/{id}',[UserController::class, 'show'])->name('users.show');

        // Engineers
        Route::get('/engineers',[EngineerController::class, 'index'])->name('engineers');
        Route::get('/engineers-new',[EngineerController::class, 'create'])->name('engineers.new');
        Route::post('/engineers',[EngineerController::class, 'store'])->name('engineers.store');
        Route::post('/engineers/{id}',[EngineerController::class, 'update'])->name('engineers.update');
        Route::delete('/engineers/{user}',[EngineerController::class, 'destroy'])->name('engineers.destroy');
        Route::patch('/engineers/{id}',[EngineerController::class, 'restore'])->name('engineers.restore');
        Route::get('/engineers/{id}',[EngineerController::class, 'show'])->name('engineers.show');

        // System Settings
        Route::get('/settings',[SettingController::class, 'index'])->name('settings');
        Route::post('/settings/{id}',[SettingController::class, 'update'])->name('settings.update');

        // Holidays
        // Route::get('/holiday',[HolidayController::class, 'index'])->name('holiday');
        Route::get('/holiday',[HolidayController::class, 'index'])->name('holiday.new');
        Route::post('/holiday',[HolidayController::class, 'store'])->name('holiday.store');
        Route::get('/holiday/edit/{holidayid}',[HolidayController::class, 'edit'])->name('holiday.edit');
        Route::post('/holiday/edit/{holiday}',[HolidayController::class, 'update'])->name('holiday.update');

        // Jobs
        Route::get('/jobs',[JobController::class, 'index'])->name('jobs');
        Route::get('/jobs/paid',[JobController::class, 'getpaidJobs'])->name('jobs.paid');
        Route::get('/jobs-new',[JobController::class, 'create'])->name('jobs.new');
        Route::get('/jobs/{id}',[JobController::class, 'show'])->name('jobs.show');
        Route::post('/jobs/{id}',[JobController::class, 'status'])->name('jobs.status');
        Route::post('/jobs/assignengineer/{engineerid}',[JobController::class, 'updateengineer'])->name('jobs.updateengineer');

        Route::post('/jobs',[JobController::class, 'store'])->name('jobs.store');
        Route::get('/jobs/edit/{jobid}',[JobController::class, 'edit'])->name('jobs.edit');
        Route::post('/jobs/edit/{job}',[JobController::class, 'update'])->name('job.update');

        Route::get('/exportjobs',[JobController::class, 'exportcsv'])->name('jobs.export');

        // delete image from job
        Route::delete('delete-image/{image_id}',[JobController::class, 'deleteimage'])->name('deleteimage');


        // Job Sheet - Engineer Control Sheet
        Route::get('/engineercontrolsheet/{job}',[EngineercontrolsheetController::class, 'show'])->name('engineercontrolsheet.show');
        Route::get('/engineercontrolsheet/export/{job}/{jobsheet}',[EngineercontrolsheetController::class, 'exportpdf'])->name('engineercontrolsheet.exportpdf');
        Route::get('/engineercontrolsheet/edit/{id}',[EngineercontrolsheetController::class, 'edit'])->name('controlsheet.edit');
        Route::post('/engineercontrolsheet/edit/{job}',[EngineercontrolsheetController::class, 'update'])->name('controlsheet.update');

        // Job Sheet - Lift Test Certificate Sheet
        Route::get('/lifttestcertificatesheet/{job}',[LifttestcertificatesheetController::class, 'show'])->name('lifttestcertificatesheet.show');
        Route::get('/lifttestcertificatesheet/export/{job}/{jobsheet}',[LifttestcertificatesheetController::class, 'exportpdf'])->name('lifttestcertificatesheet.exportpdf');
        Route::get('/lifttestcertificatesheet/edit/{id}',[LifttestcertificatesheetController::class, 'edit'])->name('lift.edit');
        Route::post('/lifttestcertificatesheet/edit/{job}',[LifttestcertificatesheetController::class, 'update'])->name('lift.update');

        // Job Sheet - Winch Test Certificate Sheet
        Route::get('/winchtestcertificatesheet/{job}',[WinchtestcertificatesheetController::class, 'show'])->name('winchtestcertificatesheet.show');
        Route::get('/winchtestcertificatesheet/export/{job}/{jobsheet}',[WinchtestcertificatesheetController::class, 'exportpdf'])->name('winchtestcertificatesheet.exportpdf');
        Route::get('/winchtestcertificatesheet/edit/{id}',[WinchtestcertificatesheetController::class, 'edit'])->name('winch.edit');
        Route::post('/winchtestcertificatesheet/edit/{job}',[WinchtestcertificatesheetController::class, 'update'])->name('winch.update');

        // Job Sheet - Lifting Various Test Certificate Sheet
        Route::get('/liftingvarioustestcertificatesheet/{job}',[LiftingVariouscertificatesheetController::class, 'show'])->name('liftingvarioustestcertificatesheet.show');
        Route::get('/liftingvarioustestcertificatesheet/export/{job}/{jobsheet}',[LiftingVariouscertificatesheetController::class, 'exportpdf'])->name('liftingvarioustestcertificatesheet.exportpdf');
        Route::get('/liftingvarioustestcertificatesheet/edit/{id}',[LiftingVariouscertificatesheetController::class, 'edit'])->name('various.edit');
        Route::post('/liftingvarioustestcertificatesheet/edit/{job}',[LiftingVariouscertificatesheetController::class, 'update'])->name('various.update');

        // Job Sheet - Thourough Inspection Sheet
        Route::get('/thouroughinspectionsheet/{job}',[ThouroughinspectionsheetController::class, 'show'])->name('thouroughinspectionsheet.show');
        Route::get('/thouroughinspectionsheet/export/{job}/{jobsheet}',[ThouroughinspectionsheetController::class, 'exportpdf'])->name('thouroughinspectionsheet.exportpdf');
        Route::get('/thouroughinspectionsheet/edit/{id}',[ThouroughinspectionsheetController::class, 'edit'])->name('thourough.edit');
        Route::post('/thouroughinspectionsheet/edit/{job}',[ThouroughinspectionsheetController::class, 'update'])->name('thourough.update');

        // Job Sheet - Crane Test Sheet
        Route::get('/cranetestcertificatesheet/{job}',[CranetestcertificatesheetController::class, 'show'])->name('cranetestcertificatesheet.show');
        Route::get('/cranetestcertificatesheet/export/{job}/{jobsheet}',[CranetestcertificatesheetController::class, 'exportpdf'])->name('cranetestcertificatesheet.exportpdf');
        Route::get('/cranetestcertificatesheet/edit/{id}',[CranetestcertificatesheetController::class, 'edit'])->name('crane.edit');
        Route::post('/cranetestcertificatesheet/edit/{job}',[CranetestcertificatesheetController::class, 'update'])->name('crane.update');


        // Clients
        Route::get('/clients',[ClientController::class, 'index'])->name('clients');
        Route::get('/clients-new',[ClientController::class, 'create'])->name('clients.new');
        Route::post('/clients',[ClientController::class, 'store'])->name('clients.store');
        Route::get('/clients/{id}',[ClientController::class, 'show'])->name('clients.show');
        Route::post('/clients/{id}',[ClientController::class, 'update'])->name('clients.update');
        Route::get('/exportclients',[ClientController::class, 'exportcsv'])->name('clients.export');

    }
);




require __DIR__.'/auth.php';
