@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-7">
                <div class="card">
                    <div class="card-header">✏️ {{ __('messages.edit_car') }}</div>
                    <div class="card-body p-4">
                        <form action="{{ route('cars.update', $car->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
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
                                <input type="text" name="reg_number" class="form-control" value="{{ old('reg_number', $car->reg_number) }}">
                            </div>
                            <div class="mb-3">
                                <label class="form-label fw-semibold">{{ __('messages.brand') }}</label>
                                <input type="text" name="brand" class="form-control" value="{{ old('brand', $car->brand) }}">
                            </div>
                            <div class="mb-3">
                                <label class="form-label fw-semibold">{{ __('messages.model') }}</label>
                                <input type="text" name="model" class="form-control" value="{{ old('model', $car->model) }}">
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

                            {{-- Nuotraukų įkėlimas --}}
                            <div class="mb-4">
                                <label class="form-label fw-semibold">Pridėti nuotraukas</label>
                                <input type="file" name="photos[]" class="form-control" multiple accept="image/*">
                                <small class="text-muted">Galite pasirinkti kelias nuotraukas vienu metu.</small>
                            </div>

                            <div class="d-flex gap-2">
                                <button type="submit" class="btn btn-primary">{{ __('messages.update') }}</button>
                                <a href="{{ route('cars.index') }}" class="btn btn-secondary">{{ __('messages.cancel') }}</a>
                            </div>
                        </form>

                        {{-- Esamos nuotraukos (už formos ribų, kad formos nesidubliuotų) --}}
                        <hr class="my-4">
                        @if($car->photos->count() > 0)
                            <h5 class="mb-3">Automobilio nuotraukos</h5>
                            <div class="row g-3">
                                @foreach($car->photos as $photo)
                                    <div class="col-6 col-md-4">
                                        <div class="card h-100 shadow-sm">
                                            <img src="{{ asset('storage/' . $photo->path) }}"
                                                 class="card-img-top"
                                                 style="height:140px; object-fit:cover;"
                                                 alt="Automobilio nuotrauka">
                                            <div class="card-body p-2 text-center">
                                                <form action="{{ route('cars.photos.destroy', $photo) }}"
                                                      method="POST"
                                                      onsubmit="return confirm('Ar tikrai norite ištrinti šią nuotrauką?');">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-sm btn-outline-danger w-100">
                                                        🗑️ Ištrinti
                                                    </button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        @else
                            <p class="text-muted mb-0">Šis automobilis dar neturi nuotraukų.</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
