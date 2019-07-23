<?php

namespace App\Http\Controllers;

use App\Enums\GenderEnum;
use App\Enums\StatusEnum;
use App\Models\Driver;
use App\Models\Vehicle;
use Illuminate\Http\Request;

class DriverController extends Controller
{
    public function index()
    {
        $drivers = Driver::with('vehicle')->get();

        return view('driver.index')->with('drivers', $drivers);
    }

    public function create()
    {
        $genders = GenderEnum::getGenders();
        $status = StatusEnum::getStatus();

        return view('driver.create')->with(['genders' => $genders, 'status' => $status]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required|string',
            'sexo' => 'required|in:M,F',
            'nascimento' => 'required|date|date_format:Y-m-d',
            'cpf' => 'required|numeric|unique:drivers',
            'modelo' => 'required|string',
            'status' => 'required|in:0, 1',
        ]);

        $newVehicle = Vehicle::firstOrCreate(['modelo' => $request->modelo]);

        $request['veiculo_id'] = $newVehicle->id;

        Driver::create($request->toArray());

        return $this->index();
    }

    public function edit($driver)
    {
        $driver = Driver::with('vehicle')->find($driver);

        $genders = GenderEnum::getGenders();
        $status = StatusEnum::getStatus();

        return view('driver.edit')->with(['driver' => $driver, 'genders' => $genders, 'status' => $status]);
    }

    public function update(Request $request, $driver)
    {
        $request['id'] = $driver;

        $request->validate([
            'id' => 'required|int|exists:drivers,id',
            'nome' => 'required|string',
            'sexo' => 'required|in:M,F',
            'nascimento' => 'required|date|date_format:Y-m-d',
            'cpf' => "required|numeric|unique:drivers,cpf,$request->id",
            'modelo' => 'required|string',
            'status' => 'required|in:0, 1'
        ]);

        $newVehicle = Vehicle::firstOrCreate(['modelo' => $request->modelo]);

        $request['veiculo_id'] = $newVehicle->id;

        Driver::find($driver)->update($request->toArray());

        $drivers = Driver::with('vehicle')->get();

        return $this->index();
    }
}
