<?php

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

Route::group(['prefix' => 'dashboard',  'middleware' => 'auth'], function()
{
    Route::get('/', 'HomeController@index')->name('home');
    Route::resource('/caffeine-sources', 'CaffeineSourcesController');
    Route::resource('/caffeine-intake', 'CaffeineIntakeController');
});


Form::macro('DeleteResourceButton', function($controller, $id)
{
    echo Form::open([
        'method' => 'DELETE',
        'action' => [$controller, $id]
    ]);
    echo '<button type="submit" onClick="return confirm(\'Are you sure you want to delete this item?\');" class="btn btn-sm btn-danger" data-toggle="tooltip" data-placement="top" title="Delete Resource" style="float:right"><i class="fa fa-trash" aria-hidden="true"></i></button>';

    echo Form::close();
});


Form::macro('DeleteAllResourcesButton', function($controller)
{
    echo Form::open([
        'method' => 'DELETE',
        'action' => [$controller]
    ]);
    echo '<button type="submit" onClick="return confirm(\'Are you sure you want to delete all items in this table?\');" class="btn btn-sm btn-danger" data-toggle="tooltip" data-placement="top" title="Delete All Resource" style="float:right"><i class="fa fa-bomb" aria-hidden="true"></i></button>';

    echo Form::close();
});
