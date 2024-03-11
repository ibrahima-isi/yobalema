<?php

namespace App\Http\Controllers;

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
        return view('client.index', ['categories' => $this->categories]);
    }
}
