@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-7">
                <div class="card">
                    <div class="card-header">➕ {{ __('messages.add_owner') }}</div>
                    <div class="card-body p-4">
                        <form action="{{ route('owners.store') }}" method="POST">
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
                                <label class="form-label fw-semibold">{{ __('messages.first_name') }}</label>
                                <input type="text" name="name" class="form-control" placeholder="e.g. John" value="{{ old('name') }}">
                            </div>
                            <div class="mb-3">
                                <label class="form-label fw-semibold">{{ __('messages.last_name') }}</label>
                                <input type="text" name="surname" class="form-control" placeholder="e.g. Smith" value="{{ old('surname') }}">
                            </div>
                            <div class="mb-3">
                                <label class="form-label fw-semibold">{{ __('messages.phone') }}</label>
                                <input type="text" name="phone" class="form-control" placeholder="e.g. +1234567890" value="{{ old('phone') }}">
                            </div>
                            <div class="mb-3">
                                <label class="form-label fw-semibold">{{ __('messages.email') }}</label>
                                <input type="email" name="email" class="form-control" placeholder="e.g. john@email.com" value="{{ old('email') }}">
                            </div>
                            <div class="mb-4">
                                <label class="form-label fw-semibold">{{ __('messages.address') }}</label>
                                <input type="text" name="address" class="form-control" placeholder="e.g. 123 Main St" value="{{ old('address') }}">
                            </div>
                            <div class="d-flex gap-2">
                                <button type="submit" class="btn btn-primary">{{ __('messages.save') }}</button>
                                <a href="{{ route('owners.index') }}" class="btn btn-secondary">{{ __('messages.cancel') }}</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
