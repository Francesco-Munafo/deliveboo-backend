@extends('layouts.admin')

@section('page-title', 'crea progetto')

@section('content')
    <div class="container py-5">
        <div class="row mb-3">
            <div class="col d-flex align-items-center mt-4">
                <h1 style="font-family: 'Kanit', sans-serif;" class="text-white flex-grow-1 m-0">
                    {{ __('Crea un nuovo progetto') }}
                </h1>
            </div>
        </div>

        <form action="{{ route('admin.restaurants.store') }}" method="POST" enctype="multipart/form-data">

            @csrf
            <div class="mb-3">
                <label for="name" class="form-label text-warning">Nome</label>
                <input type="text" class="form-control" name="name" id="name" aria-describedby="helpId"
                    placeholder="Acolyte Eco Battle staff" value="{{ old('name') }}">
                <small id="nameHelper" class="form-text text-white">
                    Digitare il nome qui

                    @error('name')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </small>
            </div>

            <div class="mb-3">
                <label for="address" class="form-label text-warning">Indirizzo</label>
                <input type="text" class="form-control" name="address" id="address" aria-describedby="addressHelper"
                    placeholder="Via don Mattei 43, Brescia" value="{{ old('address') }}">
                <small id="addressHelper" class="form-text text-white">
                    Digitare l'indirizzo qui

                    @error('address')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </small>
            </div>

            <div class="mb-3">
                <label for="description" class="form-label text-warning">Descrizione</label>
                <input type="text" class="form-control" name="description" id="description" aria-describedby="helpId"
                    placeholder="Vieni a mangiare al nostro ristorante, il divertimento è ass..."
                    value="{{ old('description') }}">
                <small id="descriptionHelper" class="form-text text-white">
                    Inserisci la descrizione del progetto qui
                </small>
            </div>


            <div class="mb-3">

                <div class="list-group">
                    <span class="mb-2">Tipo di cucina</span>
                    @foreach ($types as $type)
                        <label class="list-group-item @error('types') is-invalid @enderror">
                            <input class="form-check-input me-1" name="types[]" id="types" type="checkbox"
                                value="{{ $type->id }}"{{ in_array($type->id, old('types', [])) ? 'checked' : '' }}>
                            {{ $type->name }}
                        </label>
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
                    Carica un'immagine per il progetto corrente
                </div>
            </div>
            @error('image')
                <div class="text-danger">{{ $message }}</div>
            @enderror

            <button type="submit" class="btn btn-primary">
                CREA
            </button>
        </form>

    </div>
@endsection
