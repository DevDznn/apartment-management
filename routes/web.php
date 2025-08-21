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

Route::get('/login_landlord', function () {
    return view('pages.list_a_property.login');
});

Route::get('/register_landlord', function () {
    return view('pages.list_a_property.register');
});

Route::get('/list_a_property', function () {
    return view('pages.list_a_property.list_a_property');
});

Route::get('/login_tenant', function () {
    return view('pages.tenant-side.login');
});

Route::get('/register_tenant', function () {
    return view('pages.tenant-side.register');
});

Route::get('/landlord_dashboard', function () {
    return redirect('/landlord_dashboard/listed_property');
});

Route::get('/landlord_dashboard/listed_property', function () {
    return view('landlord.listed-property');
});

Route::get('/landlord_dashboard/list_property', function () {
    return view('landlord.list-property');
});

Route::get('/landlord_dashboard/report_listing', function () {
    return view('landlord.report-listing');
});

Route::get('/landlord_dashboard/message', function () {
    return view('landlord.message');
});