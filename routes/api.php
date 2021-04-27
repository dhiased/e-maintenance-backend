<?php

use Illuminate\Support\Facades\Route;

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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });
Route::group(['middleware' => 'jwt.auth'], function () {
    Route::resource('themes', ThemeController::class);
    Route::resource('technologies', TechnologyController::class);
    Route::resource('folders', FolderController::class);
    Route::resource('documents', DocumentController::class);
});
Route::group([

    'middleware' => 'api',
    'prefix' => 'auth',

], function () {

    Route::post('login', 'API\AuthController@login');
    Route::post('logout', 'API\AuthController@logout');
    Route::post('refresh', 'API\AuthController@refresh');
    Route::post('me', 'API\AuthController@me');

});

//get managers
// Route::group(['middleware' => 'api', 'prefix' => 'admin'], function () {

//     Route::get('managers', 'UsersController@managers');
//     Route::post('manager', 'UsersController@store');
//     Route::get('remove', 'UsersController@removeAdminAssignManager');

// });

// USERS Controller

//ADMIN SECTION **************
Route::group(['middleware' => 'api', 'prefix' => 'admin'], function () {

    //Count
    Route::get('myallnumbers', 'Admin\UsersController@myAllAdminsManagersUsersNumbers');
    Route::get('myadminsnumbers', 'Admin\UsersController@myAdminsNumbers');
    Route::get('mymanagersnumbers', 'Admin\UsersController@myManagersNumbers');
    Route::get('myusersnumbers', 'Admin\UsersController@myUsersNumbers');

    //End Count

    //Show
    Route::get('showanyuser/{id}', 'Admin\UsersController@show');
    Route::get('showall', 'Admin\UsersController@showAllAdminsManagersUsers');
    Route::get('showadmins', 'Admin\UsersController@showAllAdmins');
    Route::get('showmanagers', 'Admin\UsersController@showAllManagers');
    Route::get('showusers', 'Admin\UsersController@showAllUsers');
    //End show

    //Crud Admin
    Route::post('createadmin', 'Admin\UsersController@createAdmin');
    Route::put('updateadmin/{id}', 'Admin\UsersController@updateAdmin');
    Route::delete('destroyadmin/{id}', 'Admin\UsersController@destroyAdmin');
    //End Crud

    //Crud Manager
    Route::post('createmanager', 'Admin\UsersController@createManager');
    Route::put('updatemanager/{id}', 'Admin\UsersController@updateManager');
    Route::delete('destroymanager/{id}', 'Admin\UsersController@destroyManager');
    //End Crud Manager

    //Crud User
    Route::post('createuser', 'Admin\UsersController@createUser');
    Route::put('updateuser/{id}', 'Admin\UsersController@updateUser');
    Route::delete('destroyuser/{id}', 'Admin\UsersController@destroyUser');
    //End Crud User

    //Assign
    Route::get('adminmanager', 'Admin\UsersController@removeAdminAssignManager');
    Route::get('adminuser', 'Admin\UsersController@removeAdminAssignUser');
    Route::get('manageradmin', 'Admin\UsersController@removeManagerAssignAdmin');
    Route::get('manageruser', 'Admin\UsersController@removeManagerAssignUser');
    Route::get('useradmin', 'Admin\UsersController@removeUserAssignAdmin');
    Route::get('usermanager', 'Admin\UsersController@removeUserAssignManager');
    //End Assign
});

//**** END ADMIN SECTION ****