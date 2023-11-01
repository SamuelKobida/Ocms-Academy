<?php
 
namespace App\Arrival\Http\Controllers;

use App\Arrival\Models\Arrival;
use Backend\Classes\Controller;
use Illuminate\Http\Request;
use App\Arrival\Http\Resources\ArrivalResource;
use LibUser\Userapi\Models\User;
use Event;

class ArrivalController extends Controller
{

    public function index()
    {
        $userArrivals = Arrival::where('user_id', auth()->user()->id)->get();
        Event::fire('App.Arrival.ArrivalsRequest',[$userArrivals]);
        return ArrivalResource::collection($userArrivals);
    }

    public function store(Request $request)
    {
        $newArrival = new Arrival();
        $newArrival->arrival = now();
        $newArrival->dog = $request->dog;
        $newArrival->user_id = auth()->user()->id;
        $newArrival->save();
        return "Arrival for " . auth()->user()->name . " was successfully saved";
    }
    
}