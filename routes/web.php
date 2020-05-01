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
use App\Safe;
use App\Customer;
use App\Destination;




Route::get('/customerprofile', function () {
    return view('customers.customerprofile');
})->name('customerprofile');


Route::get('/reports', function () {
    return view('reports');
});



Route::get('/addcustomer', "CustomerController@store");


//test route for many to many relationships.

Route::get('/test', function () {
        $c = Customer::findorfail(4);
        echo $c->receipts;
        echo '<br>';
        echo '<br>';
        $d=Destination::findorfail(1);
        echo $d->receipts;
        echo '<br>';
        echo '<br>';
        echo '<br>';
        echo '<br>';
        $safe=Safe::where('safe_id',0)->first();
        echo $safe->receipts;
        echo '<br>';
        echo '<br>';
        echo '<br>';
        $receipt=Receipt::findorfail(1);
        echo '<br>';
        echo '<br>';

        echo $receipt->safe;
        // echo $r->tickets;
        // echo '<br>';
        // echo '<br>';
        // echo $r->tickets[0]->pivot;
        // echo '<br>';
        // echo '<br>';
        // echo $r->tickets[0]->pivot->amount;

});

Route::get('/sendemail', 'MailController@mail');

Auth::routes();

Route::get('/', "HomeController@index")->name('home');
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/allrefundedtickets', 'RefundedTicketController@index')->name('allrefundedtickets');
Route::get('/safe', 'SafeController@index')->name('allsafereciepts');
Route::post('/safe', 'SafeController@store')->name('saferecieptsstore');
Route::get('/customers/{id}', 'CustomerController@show');
Route::get('/allcustomers',"CustomerController@index");
Route::get('/allcustomers/ongoingpayments',"CustomerController@ongoingpayments");
Route::get('/allcustomers/latepayments',"CustomerController@latepayments");

Route::get('/edit/{id}', 'CustomerController@edit')->name('edit');
Route::post('/update/{id}', 'CustomerController@update')->name('update');




Route::resource('order', 'OrderController');
Route::resource('tickets', 'TicketController');



Route::get('/tickets/{order}/{status}', 'TicketController@orderticket')->name('orderticketcreate');
Route::get('/order/receipt/confirm', 'TicketController@confirmReceipt')->name('order.receipt.confirm');
Route::get('/order/confirm/{order}', 'OrderController@confirmview')->name('orderconfirm');
Route::get('/order/payall/{order}', 'OrderController@payAll')->name('order.payall');
Route::get('/receiptstore/{order}/{total}', 'ReceiptController@store')->name('receipts.store');
Route::get('/receiptallorder/{order}/{total}', 'ReceiptController@storeAllorder')->name('receipts.allorder');

Route::get('orderprint/{order}','OrderController@print')->name('orderprint');
Route::post('/checkticketprice','TicketController@checkprice')->name('ajax');