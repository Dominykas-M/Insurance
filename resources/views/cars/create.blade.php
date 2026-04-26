@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-7">
                <div class="card">
                    <div class="card-header">➕ {{ __('messages.add_car') }}</div>
                    <div class="card-body p-4">
                        <form action="{{ route('cars.store') }}" method="POST">
                            @csrf
                            @if($errors->any())
                                <div class="alert alert-danger" style="background: linear-gradient(135deg, #e74c3c, #c0392b); border:none; border-radius:12px; color:white; padding:1rem 1.5rem; margin-bottom:1rem;">
                                    <ul class="mb-0">
                                        @foreach($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            <div class="mb-3">
                                <label class="form-label fw-semibold">{{ __('messages.reg_number') }}</label>
                                <input type="text" name="reg_number" class="form-control" placeholder="e.g. ABC123" value="{{ old('reg_number') }}">
                            </div>
                            <div class="mb-3">
                                <label class="form-label fw-semibold">{{ __('messages.brand') }}</label>
                                <input type="text" name="brand" class="form-control" placeholder="e.g. Toyota" value="{{ old('brand') }}">
                            </div>
                            <div class="mb-3">
                                <label class="form-label fw-semibold">{{ __('messages.model') }}</label>
                                <input type="text" name="model" class="form-control" placeholder="e.g. Corolla" value="{{ old('model') }}">
                            </div>
                            <div class="mb-4">
                                <label class="form-label fw-semibold">{{ __('messages.owner') }}</label>
                                <select name="owner_id" class="form-control">
                                    @foreach($owners as $owner)
                                        <option value="{{ $owner->id }}">{{ $owner->name }} {{ $owner->surname }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="d-flex gap-2">
                                <button type="submit" class="btn btn-primary">{{ __('messages.save') }}</button>
                                <a href="{{ route('cars.index') }}" class="btn btn-secondary">{{ __('messages.cancel') }}</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
