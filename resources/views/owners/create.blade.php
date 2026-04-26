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
                            <div class="mb-3">
                                <label class="form-label fw-semibold">{{ __('messages.first_name') }}</label>
                                <input type="text" name="name" class="form-control" placeholder="e.g. John">
                            </div>
                            <div class="mb-3">
                                <label class="form-label fw-semibold">{{ __('messages.last_name') }}</label>
                                <input type="text" name="surname" class="form-control" placeholder="e.g. Smith">
                            </div>
                            <div class="mb-3">
                                <label class="form-label fw-semibold">{{ __('messages.phone') }}</label>
                                <input type="text" name="phone" class="form-control" placeholder="e.g. +1234567890">
                            </div>
                            <div class="mb-3">
                                <label class="form-label fw-semibold">{{ __('messages.email') }}</label>
                                <input type="email" name="email" class="form-control" placeholder="e.g. john@email.com">
                            </div>
                            <div class="mb-4">
                                <label class="form-label fw-semibold">{{ __('messages.address') }}</label>
                                <input type="text" name="address" class="form-control" placeholder="e.g. 123 Main St">
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
