<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Car;
use Illuminate\Http\Request;

class CarController extends Controller
{
    // GET /api/cars
    public function index()
    {
        return response()->json(Car::with('owner')->get(), 200);
    }

    // POST /api/cars
    public function store(Request $request)
    {
        $validated = $request->validate([
            'reg_number' => 'required|string|max:10|unique:cars,reg_number',
            'brand'      => 'required|string|max:50',
            'model'      => 'required|string|max:50',
            'owner_id'   => 'required|exists:owners,id',
        ]);

        $car = Car::create($validated);
        return response()->json($car, 201);
    }

    // GET /api/cars/{car}
    public function show(Car $car)
    {
        return response()->json($car->load('owner', 'photos'), 200);
    }

    // PUT/PATCH /api/cars/{car}
    public function update(Request $request, Car $car)
    {
        $validated = $request->validate([
            'reg_number' => 'sometimes|required|string|max:10|unique:cars,reg_number,'.$car->id,
            'brand'      => 'sometimes|required|string|max:50',
            'model'      => 'sometimes|required|string|max:50',
            'owner_id'   => 'sometimes|required|exists:owners,id',
        ]);

        $car->update($validated);
        return response()->json($car, 200);
    }

    // DELETE /api/cars/{car}
    public function destroy(Car $car)
    {
        $car->delete();
        return response()->json(['message' => 'Car deleted successfully'], 200);
    }
}
