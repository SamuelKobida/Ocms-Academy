<?php
use Illuminate\Support\Facades\Route;
use App\Arrival\Http\Controllers\ArrivalController;

    Route::middleware(['auth'])->group (function() 
    {    
        Route::get('arrivals', [ArrivalController::class, 'index']);
        Route::post('arrivals', [ArrivalController::class, 'store']);
    });






    

