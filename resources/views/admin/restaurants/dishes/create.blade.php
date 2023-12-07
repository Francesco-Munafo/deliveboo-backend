@extends('layouts.admin')

@section('page-title', 'crea progetto')

@section('content')
    <div class="container py-5">
        <div class="row mb-3">
            <div class="col d-flex align-items-center mt-4">
                <h1 class="flex-grow-1 m-0">
                    {{ __('Crea un nuovo piatto') }}
                </h1>
            </div>
        </div>

        <form action="{{ route('admin.restaurants.dishes.store', $restaurant_id) }}" method="POST"
            enctype="multipart/form-data">

            @csrf

            <div class="mb-3 form-floating">
                <input type="text" class="form-control" name="name" id="name" aria-describedby="helpId"
                    placeholder="Pasta al ragù" value="{{ old('name') }}">
                <label for="name" class="form-label text-warning">Nome</label>
                <small id="nameHelper" class="form-text text-white">
                    Digitare il nome qui

                    @error('name')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </small>
            </div>

            <div class="mb-3 form-floating">
                <input type="text" class="form-control" name="price" id="price" aria-describedby="priceHelper"
                    placeholder="22.50$" value="{{ old('price') }}">
                <label for="price" class="form-label text-warning">Prezzo</label>
                <small id="priceHelper" class="form-text text-white">
                    Digitare l'indirizzo qui

                    @error('price')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </small>
            </div>

            {{--      <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea class="form-control @error('description') is-invalid @enderror" name="description" id="description"
                    rows="3">{{ old('description') }}</textarea>
            </div> --}}


            <div class="form-floating">
                <textarea class="form-control @error('description') is-invalid @enderror" name="description"
                    placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px">{{ old('description') }}</textarea>
                <label for="floatingTextarea2" class="text-warning">Descrizione</label>
            </div>

            <div class="mb-3 mt-5 form-floating">

                <input type="text" class="form-control" name="course" id="course" aria-describedby="courseHelper"
                    placeholder="Secondo piatto" value="{{ old('course') }}">
                <label for="course" class="form-label text-warning">Portata</label>
                <small id="courseHelper" class="form-text text-white">
                    Digitare l'indirizzo qui

                    @error('course')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </small>
            </div>

            <div class="mb-3 form-floating">

                <input type="text" class="form-control" name="ingredients" id="ingredients"
                    aria-describedby="ingredientsHelper" placeholder="Aglo, olio, peperoncino..."
                    value="{{ old('ingredients') }}">
                <label for="ingredients" class="form-label text-warning">Ingredienti</label>
                <small id="ingredientsHelper" class="form-text text-white">
                    Digitare l'indirizzo qui

                    @error('ingredients')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </small>
            </div>

            <div class="mb-3">
                <label for="available" class="form-label text-warning">Disponibilità</label>
                <select class="form-select @error('available') is-invalid  @enderror" name="available" id="available">
                    <option value="1" selected>Disponibile</option>
                    <option value="0">Esaurito</option>
                </select>

                @error('available')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="image" class="form-label text-warning">Scegli immagine</label>
                <input type="file" class="form-control" name="image" id="image" placeholder=""
                    aria-describedby="image_helper">
                <div id="image_helper" class="form-text text-white">
                    Carica un'immagine per il progetto corrente
                </div>
                @error('image')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-warning text-white">
                CREA
            </button>
        </form>

    </div>
@endsection
