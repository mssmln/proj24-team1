<?php

use Illuminate\Support\Facades\Route;

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

//Homepage
Route::get('/', 'HomeController@index')->name('homepage');
// Pagina ricerca avanzata
Route::get('/advanced-search', 'HomeController@search')->name('search');
// Appartamento singolo nel dettaglio con Form per mandare messaggio
Route::get('/flat/{slug}', 'HomeController@flat')->name('flat');
Route::post('/flat/{slug}','HomeController@send_message')->name('send_message');
// Conferma avvenuto invio del messaggio
Route::get('/sent-message', 'HomeController@message')->name('message');


// Rotte di autenticazione Automatiche laravel
Auth::routes();

// Rotte utente autenticato 
Route::prefix('admin')->namespace('Admin')->middleware('auth')->group(function () {
    // Pagina di appoggio Home dashboard
    Route::get('/','HomeController@index')->name('home');
    // Rotte DashBoard
    Route::resource('/flat','FlatController');
    /* Pagamento */
    Route::get('/flat/{id}/payment', 'PaymentController@index')->name('payment.view');
    Route::post('/flat/{id}/payment/payment-store', 'PaymentController@payment')->name('payment.store');
    // Statistiche Appartamento
    Route::get('/flat/statistics-flat/{id_flat}','HomeController@statistics')->name('statistics');
}); 
