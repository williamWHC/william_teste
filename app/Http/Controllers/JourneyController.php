<?php

namespace App\Http\Controllers;

use App\Models\Driver;
use App\Models\Journey;
use App\Models\Passenger;
use Illuminate\Http\Request;

class JourneyController extends Controller
{
    public function index()
    {
        $journeys = Journey::with(['passenger', 'driver'])->get();

        return view('journey.index')->with('journeys', $journeys);
    }

    public function create()
    {
        return view('journey.create')->with(['drivers' => Driver::all(), 'passengers' => Passenger::all()]);
    }

    public function store(Request $request)
    {
        $request['valor'] = str_replace(',','.', $request->valor);

        $request->validate([
            'valor' => "required|regex:/^\d+(\.\d{1,2})?$/",
            'motorista' => "required|numeric",
            'passageiro' => "required|numeric"
        ]);

        $driver = Driver::find($request->motorista);

        if (!$driver->status) {
            return back()->withErrors('Não é permitido realizar uma corrida com um motorista inativo')->withInput();
        }

        $request['motorista_id'] = $request->motorista;
        $request['passageiro_id'] = $request->passageiro;

        Journey::create($request->toArray());

        return $this->index();
    }
}
