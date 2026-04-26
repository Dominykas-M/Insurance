@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <span>🚗 {{ __('messages.cars_registry') }}</span>
                @if(auth()->user()->role === 'editor')
                    <a href="{{ route('cars.create') }}" class="btn btn-primary btn-sm">+ {{ __('messages.add_car') }}</a>
                @endif
            </div>
            <div class="card-body p-0">
                @if(session('success'))
                    <div class="alert alert-success m-3">{{ session('success') }}</div>
                @endif
                <table class="table mb-0">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>{{ __('messages.reg_number') }}</th>
                        <th>{{ __('messages.brand') }}</th>
                        <th>{{ __('messages.model') }}</th>
                        <th>{{ __('messages.owner') }}</th>
                        @if(auth()->user()->role === 'editor')
                            <th>{{ __('messages.actions') }}</th>
                        @endif
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($cars as $car)
                        <tr>
                            <td>{{ $car->id }}</td>
                            <td><strong>{{ $car->reg_number }}</strong></td>
                            <td>{{ $car->brand }}</td>
                            <td>{{ $car->model }}</td>
                            <td>{{ $car->owner->name }} {{ $car->owner->surname }}</td>
                            @if(auth()->user()->role === 'editor')
                                <td>
                                    <a href="{{ route('cars.edit', $car->id) }}" class="btn btn-warning btn-sm">{{ __('messages.edit') }}</a>
                                    <form action="{{ route('cars.destroy', $car->id) }}" method="POST" style="display:inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">{{ __('messages.delete') }}</button>
                                    </form>
                                </td>
                            @endif
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
