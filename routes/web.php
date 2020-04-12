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
use App\Receipt;


Route::get('/', function () {
    return view('welcome');
})->name('welcome');


Route::get('/customerprofile', function () {
    return view('customerprofile');
})->name('customerprofile');

//Route::get('/safe', function () {
//    return view('safe');
//});

Route::get('/tickets', function () {
    return view('tickets');
})->name('tickets');

Route::get('/alltickets', function () {
    return view('alltickets');
});

Route::get('/vieworderdetails', function () {
    return view('vieworderdetails');
})->name('vieworderdetails');

Route::get('/reports', function () {
    return view('reports');
});

Route::get('/allcustomers',"CustomerController@index");

Route::get('/addcustomer', "CustomerController@store");

Route::get('/createticket', function () {
    return view('createticket');
})->name('createticket');

//test route for many to many relationships.

Route::get('/test', function () {
        $r = Receipt::findorfail(1); 
        
        echo $r->tickets;
        echo '<br>';
        echo '<br>';
        echo $r->tickets[0]->pivot;
        echo '<br>';
        echo '<br>';
        echo $r->tickets[0]->pivot->amount;
    
});


Auth::routes();


Route::get('/home', 'HomeController@index')->name('home');
Route::get('/allorders', 'OrderController@index')->name('allorders');
Route::get('order/delete/{id}', 'OrderController@destroy');
Route::get('/allrefundedtickets', 'RefundedTicketController@index')->name('allrefundedtickets');
Route::get('/safe', 'SafeController@index')->name('allsafereciepts');
Route::post('/safe', 'SafeController@store')->name('saferecieptsstore');
