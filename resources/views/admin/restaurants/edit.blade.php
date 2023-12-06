@extends('layouts.admin')

@section('page-title', 'Aggiorna ristorante')

@section('content')
    <div class="container py-5">
        <div class="row mb-3">
            <div class="col d-flex align-items-center mt-4">
                <h1 class="flex-grow-1 m-0">
                    {{ __('Aggiorna il ristorante') }}
                </h1>
            </div>
        </div>

        <form action="{{ route('admin.restaurants.update', $restaurant) }}" method="POST" enctype="multipart/form-data">

            @csrf
            @method('PUT')
            <div class="mb-3 form-floating">

                <input type="text" class="form-control" name="name" id="name" aria-describedby="helpId"
                    placeholder="Ristorante Miramare" value="{{ old('name', $restaurant->name) }}">
                <label for="name" class="form-label text-warning">Nome</label>
                <small id="nameHelper" class="form-text text-white">
                    Digitare il nome qui

                    @error('name')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </small>
            </div>

            <div class="mb-3 form-floating">

                <input type="text" class="form-control" name="address" id="address" aria-describedby="addressHelper"
                    placeholder="Via don Mattei 43, Brescia" value="{{ old('address', $restaurant->address) }}">
                <label for="address" class="form-label text-warning">Indirizzo</label>
                <small id="addressHelper" class="form-text text-white">
                    Digitare l'indirizzo qui

                    @error('address')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </small>
            </div>


            <div class="mb-3">
                <label for="description" class="form-label text-warning">Descrizione</label>
                <textarea class="form-control @error('description') is-invalid @enderror" name="description" id="description"
                    rows="3">{{ old('description', $restaurant->description) }}</textarea>
            </div>

            <div class="mb-3">

                <div class="list-group">
                    <span class="mb-2">Tipologia di cucina</span>

                    @foreach ($types as $type)
                        @if ($errors->any())
                            <label class="list-group-item @error('types') is-invalid @enderror">
                                <input class="form-check-input me-1" name="types[]" id="types" type="checkbox"
                                    value="{{ $type->id }}"
                                    {{ in_array($type->id, old('types', [])) ? 'checked' : '' }}>
                                {{ $type->name }}
                            </label>
                        @else
                            <label class="list-group-item @error('types') is-invalid @enderror">
                                <input class="form-check-input me-1" name="types[]" id="types" type="checkbox"
                                    value="{{ $type->id }}"
                                    {{ $restaurant->types->contains($type) ? 'checked' : '' }}>
                                {{ $type->name }}
                            </label>
                        @endif
                    @endforeach

                </div>
            </div>
            @error('types')
                <div class="text-danger">{{ $message }}</div>
            @enderror


            <div class="mb-3">
                <label for="image" class="form-label text-warning">Scegli immagine</label>
                <input type="file" class="form-control" name="image" id="image" placeholder=""
                    aria-describedby="image_helper">
                <div id="image_helper" class="form-text text-white">
                    Carica un'immagine per il ristorante corrente
                </div>
            </div>
            @error('image')
                <div class="text-danger">{{ $message }}</div>
            @enderror

            <button type="submit" class="btn bg_color text-white">
                AGGIORNA
            </button>
        </form>

    </div>
    </div>
@endsection
