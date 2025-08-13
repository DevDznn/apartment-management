<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/apartment', function () {
    return view('pages.apartment.apartment');
});

Route::get('/apartment-details', function () {
    return view('pages.apartment_details.apartment-card-details');
});

Route::get('/location', function () {
    return view('pages.navigation');
}); 

Route::get('/messages', function () {
    return view('pages.messages');
});