<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UnitController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\FloorController;
use App\Http\Controllers\CampusController;
use App\Http\Controllers\LeaderController;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\ProblemController;
use App\Http\Controllers\BuildingController;
use App\Http\Controllers\DirectorController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\PrioritieController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\ServiceUnitController;
use App\Http\Controllers\UserSupportController;
use App\Http\Controllers\AssignedOfficeController;
use App\Http\Controllers\AssignedOrgUnitController;
use App\Http\Controllers\OrganizationalUnitController;

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

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::prefix('/')
    ->middleware('auth')
    ->group(function () {
        Route::resource('roles', RoleController::class);
        Route::resource('permissions', PermissionController::class);

        Route::resource('users', UserController::class);
        Route::resource('campuses', CampusController::class);
        Route::resource('buildings', BuildingController::class);
        Route::resource('directors', DirectorController::class);
        Route::resource('leaders', LeaderController::class);
        Route::resource('problems', ProblemController::class);
        Route::resource('units', UnitController::class);
        Route::resource('service-units', ServiceUnitController::class);
        Route::resource('user-supports', UserSupportController::class);
        Route::resource('assigned-offices', AssignedOfficeController::class);
        Route::resource('priorities', PrioritieController::class);
        Route::resource(
            'organizational-units',
            OrganizationalUnitController::class
        );
        Route::resource('assigned-org-units', AssignedOrgUnitController::class);
        Route::resource('floors', FloorController::class);
        Route::resource('customers', CustomerController::class);
        Route::resource('tickets', TicketController::class);
    });
