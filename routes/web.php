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
    return view('home');
})->name('home');

Route::get('/allcustomers', function () {
    return view('allcustomers');
});

Route::get('/customerprofile', function () {
    return view('customerprofile');
})->name('customerprofile');

Route::get('/safe', function () {
    return view('safe');
});

Route::get('/tickets', function () {
    return view('tickets');
})->name('tickets');

Route::get('/alltickets', function () {
    return view('alltickets');
});

<<<<<<< HEAD

Route::get('/viewreceiptdetails', function () {
    return view('viewreceiptdetails');
})->name('viewreceiptdetails');
=======
Route::get('/vieworderdetails', function () {
    return view('vieworderdetails');
})->name('vieworderdetails');
>>>>>>> 54a45944ce592c5a0e374bd0cd3eefbf98fd0612

Route::get('/reports', function () {
    return view('reports');
});

Route::get('/createticket', function () {
    return view('createticket');
})->name('createticket');

Auth::routes();


Route::get('/home', 'HomeController@index')->name('home');
Route::get('/allorders', 'OrderController@index')->name('allorders');
<<<<<<< HEAD
Route::get('/allrefundedtickets', 'refundedticketController@index')->name('allrefundedtickets');
=======
Route::get('order/delete/{id}', 'OrderController@destroy');
>>>>>>> 54a45944ce592c5a0e374bd0cd3eefbf98fd0612


// Route::get('/allorders', function () {
//     return view('allorders');
// });
