<?php
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Arrival\Models\Arrival;
use App\Arrival\Http\Controllers\ArrivalController;


    Route::middleware(['auth'])->group (function() 
    {    
        // ...
    });

    Route::get('arrivals', [ArrivalController::class, 'getArrivals']);




    

