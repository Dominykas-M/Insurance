@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <span>🚗 Car Registry</span>
                @if(auth()->user()->role === 'editor')
                    <a href="{{ route('cars.create') }}" class="btn btn-primary btn-sm">+ Add Car</a>
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
                        <th>Reg Number</th>
                        <th>Brand</th>
                        <th>Model</th>
                        <th>Owner</th>
                        @if(auth()->user()->role === 'editor')
                            <th>Actions</th>
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
                                    <a href="{{ route('cars.edit', $car->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                    <form action="{{ route('cars.destroy', $car->id) }}" method="POST" style="display:inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
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
