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

// Route::get('/', function () {
//     return view('welcome');
// });


Route::group(['middleware' => 'auth'], function() {
  Route::get('/', 'HomeController@index')->name('home');

  Route::get('/folders/{id}/tasks', 'TaskController@index')->name('tasks.index');

  Route::get('/folders/create', 'FolderController@showCreateForm')->name('folders.create');
  Route::post('/folders/create', 'FolderController@create');

  Route::get('/folders/{id}/tasks/create', 'TaskController@showCreateForm')->name('tasks.create');
  Route::post('/folders/{id}/tasks/create', 'TaskController@create');

  Route::get('/folders/{id}/tasks/{task_id}/edit', 'TaskController@showEditForm')->name('tasks.edit');
  Route::post('/folders/{id}/tasks/{task_id}/edit', 'TaskController@edit');

  Route::get('/comment', 'CommentController@showForm')->name('comment');
  // 入力を受け付けるルート
  Route::post('/comment', 'CommentController@create');
  // 入力後にリダイレクトする完了画面のルート
  Route::get('/comment/thanks', 'CommentController@thanks')->name('comment.thanks');
});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
