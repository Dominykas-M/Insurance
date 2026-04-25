@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-7">
                <div class="card">
                    <div class="card-header">➕ Add New Car</div>
                    <div class="card-body p-4">
                        <form action="{{ route('cars.store') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label class="form-label fw-semibold">Reg Number</label>
                                <input type="text" name="reg_number" class="form-control" placeholder="e.g. ABC123">
                            </div>
                            <div class="mb-3">
                                <label class="form-label fw-semibold">Brand</label>
                                <input type="text" name="brand" class="form-control" placeholder="e.g. Toyota">
                            </div>
                            <div class="mb-3">
                                <label class="form-label fw-semibold">Model</label>
                                <input type="text" name="model" class="form-control" placeholder="e.g. Corolla">
                            </div>
                            <div class="mb-4">
                                <label class="form-label fw-semibold">Owner</label>
                                <select name="owner_id" class="form-control">
                                    @foreach($owners as $owner)
                                        <option value="{{ $owner->id }}">{{ $owner->name }} {{ $owner->surname }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="d-flex gap-2">
                                <button type="submit" class="btn btn-primary">Save Car</button>
                                <a href="{{ route('cars.index') }}" class="btn btn-secondary">Cancel</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
