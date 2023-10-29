<?php
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Arrival\Models\Arrival;

Route::get('get_arrivals', function () {
    return Arrival::all();
});

Route::post('post_arrival', function (Request $request) {
    Arrival::create($request->all());
    return "New arrival created";
});