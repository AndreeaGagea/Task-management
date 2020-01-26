<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
Route::get('register', 'Auth\AuthController@getRegister');
Route::post('/register', 'Auth\AuthController@postRegister'); 
Route::auth();
Route::get('/home', 'HomeController@index');
Route::get('/logout', 'HomeController@getLogout');



Route::get('/projects', 'ProjectController@index');
Route::group(['middleware' => 'auth'], function(){
	Route::resource('projects', 'ProjectController');
});

Route::get('/tasks', 'TaskController@index');

Route::group(['middleware' => 'auth'], function(){
	Route::resource('tasks', 'TaskController');
});
Route::get('/tasks/create', 'TaskController@create')->name('task.create'); 
Route::get('/tasks','TaskController@index')->name('task.show') ;
Route::post('/tasks/store', 'TaskController@store')->name('task.store');
Route::get('/tasks/sort/{key}', 'TaskController@sort')->name('task.sort') ;
Route::get('/tasks/list/{projectid}','TaskController@tasklist')->name('task.list');
Route::get('/tasks/edit/{id}','TaskController@edit')->name('task.edit');
Route::post('/tasks/update/{id}', 'TaskController@update')->name('task.update') ;
Route::get('/tasks/delete/{id}', 'TaskController@destroy')->name('task.destroy') ;
Route::get('/tasks/completed/{id}','TaskController@completed')->name('task.completed');



Route::post('/projects/{project}/tasks', 'TaskController@store');


	Route::get('/users/list/{id}','UserController@userTaskList')->name('users.list');

Route::auth();
Route::resource('user', 'UserController');
Route::get('/users', 'UserController@index');
Route::post('/users', 'UserController@store');
Route::get('/users/{user}/edit', 'UserController@edit');
Route::patch('/users/{user}', 'UserController@update');
Route::delete('/users/{user}', 'UserController@destroy');


//Route::get('/home', 'HomeController@index');

Route::group(['middleware' => ['web' , 'auth']], function(){
	Route::get('/', 'DispatcherController@index');
	/*Route::get('/', function() {
	if (Auth::user()->admin == 0) {
		return view('home');
	} 
	else 
	{
		$users['users'] = \App\User::all();
		return view('adminhome', $users);
	}
});*/
});




/*
Route::get('/admin', 'AdminController@admin')    
    ->middleware('is_admin')    
    ->name('admin');
*/
