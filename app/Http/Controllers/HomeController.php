<?php

namespace App\Http\Controllers;

use App\Models\Location;
use App\Models\Vehicule;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;

class HomeController extends Controller
{
    private array $categories = array(
        "Camion" => 'CAMION',
        "Voiture" => 'VOITURE',
        "Camion Citerne" => 'CITERNE',
        'Bus' => 'BUS',
    );


    public function index(): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        $vehicules_count = Vehicule::all()->count();
        $locations_count = Location::all()->count();
        return view('client.index', [
            'vehicules_count' => $vehicules_count,
            'locations_count' => $locations_count,
            'categories' => $this->categories
        ]);
    }
}
