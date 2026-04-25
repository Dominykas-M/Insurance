@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Edit Car</h1>
        <form action="{{ route('cars.update', $car->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label>Reg Number</label>
                <input type="text" name="reg_number" class="form-control" value="{{ $car->reg_number }}">
            </div>
            <div class="mb-3">
                <label>Brand</label>
                <input type="text" name="brand" class="form-control" value="{{ $car->brand }}">
            </div>
            <div class="mb-3">
                <label>Model</label>
                <input type="text" name="model" class="form-control" value="{{ $car->model }}">
            </div>
            <div class="mb-3">
                <label>Owner</label>
                <select name="owner_id" class="form-control">
                    @foreach($owners as $owner)
                        <option value="{{ $owner->id }}" {{ $car->owner_id == $owner->id ? 'selected' : '' }}>
                            {{ $owner->name }} {{ $owner->surname }}
                        </option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
            <a href="{{ route('cars.index') }}" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
@endsection
