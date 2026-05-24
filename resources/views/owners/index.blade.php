@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <span>👤 {{ __('messages.owners_registry') }}</span>
                @can('create', App\Models\Owner::class)
                    <a href="{{ route('owners.create') }}" class="btn btn-primary btn-sm">+ {{ __('messages.add_owner') }}</a>
                @endcan
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
                        <th>{{ __('messages.actions') }}</th>
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
                            <td>
                                @can('update', $owner)
                                    <a href="{{ route('owners.edit', $owner->id) }}" class="btn btn-warning btn-sm">{{ __('messages.edit') }}</a>
                                @endcan
                                @can('delete', $owner)
                                    <form action="{{ route('owners.destroy', $owner->id) }}" method="POST" style="display:inline" onsubmit="return confirm('Ar tikrai?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">{{ __('messages.delete') }}</button>
                                    </form>
                                @endcan
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
