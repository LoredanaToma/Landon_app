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
    
    return'<h3>Landon App page</h3>';
    
    //return view('welcome');
});

Route::get('/about', function () {
    
    $response_arr=[];
    $response_arr['author']='BP';
    $response_arr['version']='2.1.';
    return $response_arr;
    
    //return'<h3>About</h3>';
    
   
});
Route::get('/home', function () {
    
    $data=[];
    $data['version']='0.1.1.';
    return view('welcome', $data);
    
});


Route::get('/di', 'ClientController@di');

    
 Route::get('/facades/db', function () {
    
  
    return DB::select('SELECT * from table');
    
});  
    
  Route::get('/facades/encrypt', function () {
    
  
    return Crypt::encrypt('lore');
    
});   

  Route::get('/facades/decrypt', function () {
    
  
    return Crypt::decrypt('eyJpdiI6IlVDNXB1Ymk5cmJBdmkrOEc2UEV2VFE9PSIsInZhbHVlIjoibFpSWkFibXJDTW9iUjgyXC9XaGdSR0E9PSIsIm1hYyI6ImUzMTBhYmY3ZTU5ZWZmOGYwZTgyNDM0YWVkYzNhODA3YzVlNmRmY2ZiYTU1YTAyYzRlZjNjZDg3OTM4NThjNWQifQ== ');
    
});

Route::get('/', 'ContentsController@home');

Route::get('/clients', 'ClientController@index');


//get&post new&create
Route::get('/clients/new', 'ClientController@newClient');
Route::post('/clients/new', 'ClientController@create');

//get&post Client show&modify
Route::get('/clients/{client_id}', 'ClientController@show');
Route::post('/clients/{client_id}', 'ClientController@modify');


//get&post reservations
Route::get('/reservations/{client_id}', 'RoomsController@checkAvailableRooms');
Route::post('/reservations/{client_id}', 'RoomsController@checkAvailableRooms');

//get&post book
Route::get('/book/room/{client_id}/{room_id}/{date_in}/{date_out}', 'ReservationsController@bookRoom');