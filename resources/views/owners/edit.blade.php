@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-7">
                <div class="card">
                    <div class="card-header">✏️ {{ __('messages.edit_owner') }}</div>
                    <div class="card-body p-4">
                        <form action="{{ route('owners.update', $owner->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="mb-3">
                                <label class="form-label fw-semibold">{{ __('messages.first_name') }}</label>
                                <input type="text" name="name" class="form-control" value="{{ $owner->name }}">
                            </div>
                            <div class="mb-3">
                                <label class="form-label fw-semibold">{{ __('messages.last_name') }}</label>
                                <input type="text" name="surname" class="form-control" value="{{ $owner->surname }}">
                            </div>
                            <div class="mb-3">
                                <label class="form-label fw-semibold">{{ __('messages.phone') }}</label>
                                <input type="text" name="phone" class="form-control" value="{{ $owner->phone }}">
                            </div>
                            <div class="mb-3">
                                <label class="form-label fw-semibold">{{ __('messages.email') }}</label>
                                <input type="email" name="email" class="form-control" value="{{ $owner->email }}">
                            </div>
                            <div class="mb-4">
                                <label class="form-label fw-semibold">{{ __('messages.address') }}</label>
                                <input type="text" name="address" class="form-control" value="{{ $owner->address }}">
                            </div>
                            <div class="d-flex gap-2">
                                <button type="submit" class="btn btn-primary">{{ __('messages.update') }}</button>
                                <a href="{{ route('owners.index') }}" class="btn btn-secondary">{{ __('messages.cancel') }}</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
