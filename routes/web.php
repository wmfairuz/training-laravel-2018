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

Route::get('/home', 'HomeController@index')->name('home');



Route::get('/kucing', function() {
    echo "hello kucing";
});


Route::get('/arnab', function() {
    ///

    return view('arnab');
});



// // Route untuk show all users
// Route::get('/users', function() {
//     $user_list = App\User::get();

//     return view('users', compact('user_list'));
// });


// // Route untuk show one user
// Route::get('/users/{id}', function($id) {
//     $user = App\User::find($id);

//     return view('show_user', compact('user'));
// });






// Route::group(['prefix' => 'users'], function() {
//     Route::get('/', function() {
//         // get all users
//         $user_list = App\User::get();

//         return view('users.index', compact('user_list'));
//     });

//     Route::get('/{id}', function($id) {
//         $user = App\User::find($id);

//         return view('users.show', compact('user'));
//     });

// });


Route::group(['prefix' => 'users'], function() {
   Route::get('/', 'UserController@index');
   Route::get('/{id}', 'UserController@show');
});

Route::group(['prefix' => 'trainings'], function() {
   // show create training form
   Route::get('/create', 'TrainingController@create');
   // create new training
   Route::post('/', 'TrainingController@store');

   // show edit form
   Route::get('/edit/{id}', 'TrainingController@edit');
   // store edited training in db
   Route::patch('/{id}', 'TrainingController@update');

   // Get all trainings
   Route::get('/', 'TrainingController@index');
   // Get one training
   Route::get('/{id}', 'TrainingController@show');
   // delete training
   Route::delete('/{id}', 'TrainingController@destroy');
});

Route::resource('trainings', 'TrainingController');









