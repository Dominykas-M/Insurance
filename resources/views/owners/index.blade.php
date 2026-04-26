@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <span>👤 {{ __('messages.owners_registry') }}</span>
                @if(auth()->user()->role === 'editor')
                    <a href="{{ route('owners.create') }}" class="btn btn-primary btn-sm">+ {{ __('messages.add_owner') }}</a>
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
                        <th>{{ __('messages.first_name') }}</th>
                        <th>{{ __('messages.last_name') }}</th>
                        <th>{{ __('messages.phone') }}</th>
                        <th>{{ __('messages.email') }}</th>
                        <th>{{ __('messages.address') }}</th>
                        @if(auth()->user()->role === 'editor')
                            <th>{{ __('messages.actions') }}</th>
                        @endif
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($owners as $owner)
                        <tr>
                            <td>{{ $owner->id }}</td>
                            <td><strong>{{ $owner->name }}</strong></td>
                            <td>{{ $owner->surname }}</td>
                            <td>{{ $owner->phone }}</td>
                            <td>{{ $owner->email }}</td>
                            <td>{{ $owner->address }}</td>
                            @if(auth()->user()->role === 'editor')
                                <td>
                                    <a href="{{ route('owners.edit', $owner->id) }}" class="btn btn-warning btn-sm">{{ __('messages.edit') }}</a>
                                    <form action="{{ route('owners.destroy', $owner->id) }}" method="POST" style="display:inline">
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
