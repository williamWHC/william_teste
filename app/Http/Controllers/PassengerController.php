<?php

namespace App\Http\Controllers;

use App\Enums\GenderEnum;
use App\Enums\StatusEnum;
use App\Models\Passenger;
use Illuminate\Http\Request;

class PassengerController extends Controller
{
    public function index()
    {
        return view('passenger.index')->with('passengers', Passenger::all());
    }

    public function create()
    {
        $genders = GenderEnum::getGenders();
        $status = StatusEnum::getStatus();

        return view('passenger.create')->with(['genders' => $genders, 'status' => $status]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required|string',
            'sexo' => 'required|in:M,F',
            'nascimento' => 'required|date|date_format:Y-m-d',
            'cpf' => 'required|numeric|unique:passengers',
        ]);

        Passenger::create($request->toArray());

        return $this->index();
    }

    public function edit($passenger)
    {
        $passenger = Passenger::find($passenger);

        $genders = GenderEnum::getGenders();
        $status = StatusEnum::getStatus();

        return view('passenger.edit')->with(['passenger' => $passenger, 'genders' => $genders, 'status' => $status]);
    }

    public function update(Request $request, $passenger)
    {
        $request['id'] = $passenger;

        $request->validate([
            'id' => 'required|int|exists:passengers,id',
            'nome' => 'required|string',
            'sexo' => 'required|in:M,F',
            'nascimento' => 'required|date|date_format:Y-m-d',
            'cpf' => "required|numeric|unique:passengers,cpf,$request->id",
        ]);

        Passenger::find($passenger)->update($request->toArray());

        return $this->index();
    }
}

