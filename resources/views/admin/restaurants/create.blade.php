@extends('layouts.admin')

@section('page-title', 'crea ristorante')

@section('content')

    <div class="container py-5">
        <div class="row mb-3">
            <div class="col d-flex align-items-center mt-4">
                <h1 class="flex-grow-1 m-0">
                    {{ __('Crea un nuovo ristorante') }}
                </h1>
            </div>
        </div>

        <form action="{{ route('admin.restaurants.store') }}" method="POST" enctype="multipart/form-data">

            @csrf
            <div class="mb-3 form-floating ">

                <input type="text" class="form-control " name="name" id="name" aria-describedby="helpId"
                    placeholder="Ristorante Miramare" value="{{ old('name') }}">
                <label for="name" class="form-label text-warning">Nome</label>
                <small id="nameHelper" class="form-text text-white ">
                    Digitare il nome qui

                    @error('name')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </small>
            </div>

            <div class="mb-3 form-floating">

                <input type="text" class="form-control" name="address" id="address" aria-describedby="addressHelper"
                    placeholder="Via don Mattei 43, Brescia" value="{{ old('address') }}">
                <label for="address" class="form-label text-warning">Indirizzo</label>
                <small id="addressHelper" class="form-text text-white">
                    Digitare l'indirizzo qui

                    @error('address')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </small>
            </div>

            {{--   <div class="mb-3 form-floating">

                <textarea class="form-control @error('description') is-invalid @enderror" name="description" id="floatingTextarea"
                    rows="3">{{ old('description') }}</textarea>
                <label for="description" class="form-label floatingTextarea text-warning"></label>

            </div> --}}

            <div class="form-floating">
                <textarea class="form-control @error('description') is-invalid @enderror" name="description"
                    placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px">{{ old('description') }}</textarea>
                <label for="floatingTextarea2" class="text-warning">Descrizione</label>
            </div>

            <div class="mb-2 pt-2 form-floating">
                <div class="list-group">
                    <span class="mb-2 text-warning">Tipo di cucina</span>
                    @foreach ($types as $type)
                        <label class="list-group-item @error('types') is-invalid @enderror">
                            <input class="form-check-input me-1" name="types[]" id="types" type="checkbox"
                                value="{{ $type->id }}"{{ in_array($type->id, old('types', [])) ? 'checked' : '' }}>
                            {{ $type->name }}
                        </label>
                    @endforeach

                    @error('types')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>


            <div class="mb-3">
                <label for="image" class="form-label text-warning">Scegli immagine</label>
                <input type="file" class="form-control" name="image" id="image" placeholder=""
                    aria-describedby="image_helper">
                <div id="image_helper" class="form-text text-white">
                    Carica un'immagine per il progetto corrente

                    @error('image')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <button type="submit" class="btn btn-warning  text-white mt-2">
                CREA
            </button>
        </form>

    </div>
@endsection
