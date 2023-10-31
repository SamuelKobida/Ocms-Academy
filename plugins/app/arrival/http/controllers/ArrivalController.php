<?php
 
namespace App\Arrival\Http\Controllers;

use App\Arrival\Models\Arrival;
use Backend\Classes\Controller;
use App\Arrival\Http\Resources\ArrivalResource;


class ArrivalController extends Controller
{

    public function getArrivals()
    {
        return ArrivalResource::collection(Arrival::all());
    }
    
}