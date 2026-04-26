<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\Owner;
use Illuminate\Http\Request;

class CarController extends Controller
{
    public function index()
    {
        $cars = Car::with('owner')->get();
        return view('cars.index', compact('cars'));
    }

    public function create()
    {
        $owners = Owner::all();
        return view('cars.create', compact('owners'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'reg_number' => 'required|string|min:2|max:10|unique:cars,reg_number|regex:/^[A-Z0-9]{2,8}$/',
            'brand' => 'required|string|min:2|max:50',
            'model' => 'required|string|min:1|max:50',
            'owner_id' => 'required|exists:owners,id',
        ], [
            'reg_number.required' => __('validation.reg_number_required'),
            'reg_number.regex' => __('validation.reg_number_regex'),
            'reg_number.unique' => __('validation.reg_number_unique'),
            'reg_number.min' => __('validation.reg_number_min'),
            'reg_number.max' => __('validation.reg_number_max'),
            'brand.required' => __('validation.brand_required'),
            'brand.min' => __('validation.brand_min'),
            'model.required' => __('validation.model_required'),
            'owner_id.required' => __('validation.owner_required'),
        ]);

        Car::create($request->all());
        return redirect()->route('cars.index')->with('success', __('validation.car_added'));
    }

    public function edit(Car $car)
    {
        $owners = Owner::all();
        return view('cars.edit', compact('car', 'owners'));
    }

    public function update(Request $request, Car $car)
    {
        $request->validate([
            'reg_number' => 'required|string|min:2|max:10|unique:cars,reg_number,'.$car->id.'|regex:/^[A-Z0-9]{2,8}$/',
            'brand' => 'required|string|min:2|max:50',
            'model' => 'required|string|min:1|max:50',
            'owner_id' => 'required|exists:owners,id',
        ], [
            'reg_number.required' => __('validation.reg_number_required'),
            'reg_number.regex' => __('validation.reg_number_regex'),
            'reg_number.unique' => __('validation.reg_number_unique'),
            'reg_number.min' => __('validation.reg_number_min'),
            'reg_number.max' => __('validation.reg_number_max'),
            'brand.required' => __('validation.brand_required'),
            'brand.min' => __('validation.brand_min'),
            'model.required' => __('validation.model_required'),
            'owner_id.required' => __('validation.owner_required'),
        ]);

        $car->update($request->all());
        return redirect()->route('cars.index')->with('success', __('validation.car_updated'));
    }

    public function destroy(Car $car)
    {
        $car->delete();
        return redirect()->route('cars.index')->with('success', 'Car deleted successfully');
    }

}
