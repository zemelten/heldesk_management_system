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
use App\Http\Controllers\ReportsController;
use App\Http\Controllers\BuildingController;
use App\Http\Controllers\DirectorController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\PrioritieController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\ServiceUnitController;
use App\Http\Controllers\UserSupportController;
use App\Http\Controllers\AssignedOfficeController;
use App\Http\Controllers\AssignedOrgUnitController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\ProblemCatagoryController;
use App\Http\Controllers\EscalatedTicketController;
use App\Http\Controllers\OrganizationalUnitController;
use App\Http\Controllers\TimeSettingController;
use App\Http\Controllers\UpdateProfileController;
use App\Models\Building;

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
    return redirect("/dashboard");
});

Route::post('/login',[LoginController::class, 'login'])->name('login');
Route::get('/login',[LoginController::class, 'showLoginForm']);
Route::post('/logout',[LoginController::class, 'logout'])->middleware('auth')->name('logout');


Route::get('/dashboard', [HomeController::class, 'index'])->name('home');
Route::prefix('/')->middleware(['auth', 'isEdited'])
    ->group(function () {
        Route::resource('tickets', TicketController::class);
    });

Route::prefix('/')
    ->middleware('auth')
    ->group(function () {
        Route::resource('roles', RoleController::class);
        Route::resource('permissions', PermissionController::class);
        Route::resource('time-settings', TimeSettingController::class);
        Route::resource('users', UserController::class);
        Route::resource('campuses', CampusController::class);
        Route::resource('buildings', BuildingController::class);
        Route::resource('time-settings', TimeSettingController::class);
        Route::post('/get-org-units', [BuildingController::class, 'getOrgUnits']);
        Route::post('/get-buildings', [BuildingController::class, 'getBuildings']);
        Route::post('/get-problems', [ProblemCatagoryController::class, 'getProblems']);
        Route::resource('directors', DirectorController::class);
        Route::resource('leaders', LeaderController::class);
        Route::resource('problems', ProblemController::class);
        Route::resource('units', UnitController::class);
        Route::resource('updateprofile', UpdateProfileController::class);
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
        Route::resource('problem-catagories', ProblemCatagoryController::class);

        Route::resource('escalated-tickets', EscalatedTicketController::class);
        Route::get('all-reports', [ReportsController::class, 'index'])->name(
            'all-reports.index'
        );
        Route::post('all-reports', [ReportsController::class, 'store'])->name(
            'all-reports.store'
        );
        Route::get('all-reports/create', [
            ReportsController::class,
            'create',
        ])->name('all-reports.create');
        Route::get('all-reports/{reports}', [
            ReportsController::class,
            'show',
        ])->name('all-reports.show');
        Route::get('all-reports/{reports}/edit', [
            ReportsController::class,
            'edit',
        ])->name('all-reports.edit');
        Route::put('all-reports/{reports}', [
            ReportsController::class,
            'update',
        ])->name('all-reports.update');
        Route::delete('all-reports/{reports}', [
            ReportsController::class,
            'destroy',
        ])->name('all-reports.destroy');
    });
