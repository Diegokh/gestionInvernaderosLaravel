<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sensor;

class ControladorSensor extends Controller
{
    public function index()
    {
        return Sensor::all();
    }
}
