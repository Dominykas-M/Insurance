@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-7">
                <div class="card">
                    <div class="card-header">✏️ {{ __('messages.edit_car') }}</div>
                    <div class="card-body p-4">
                        <form action="{{ route('cars.update', $car->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="mb-3">
                                <label class="form-label fw-semibold">{{ __('messages.reg_number') }}</label>
                                <input type="text" name="reg_number" class="form-control" value="{{ $car->reg_number }}">
                            </div>
                            <div class="mb-3">
                                <label class="form-label fw-semibold">{{ __('messages.brand') }}</label>
                                <input type="text" name="brand" class="form-control" value="{{ $car->brand }}">
                            </div>
                            <div class="mb-3">
                                <label class="form-label fw-semibold">{{ __('messages.model') }}</label>
                                <input type="text" name="model" class="form-control" value="{{ $car->model }}">
                            </div>
                            <div class="mb-4">
                                <label class="form-label fw-semibold">{{ __('messages.owner') }}</label>
                                <select name="owner_id" class="form-control">
                                    @foreach($owners as $owner)
                                        <option value="{{ $owner->id }}" {{ $car->owner_id == $owner->id ? 'selected' : '' }}>
                                            {{ $owner->name }} {{ $owner->surname }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="d-flex gap-2">
                                <button type="submit" class="btn btn-primary">{{ __('messages.update') }}</button>
                                <a href="{{ route('cars.index') }}" class="btn btn-secondary">{{ __('messages.cancel') }}</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
