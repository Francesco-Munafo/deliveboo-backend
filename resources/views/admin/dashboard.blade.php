@extends('layouts.admin')

@section('content')
    <div class="container">
        <h2 class=" fw-bolder my-4">
            I tuoi ristoranti
        </h2>

        <div class="my-4">
            <button class="btn btn-warning fw-bold">
                <a href="{{ route('admin.restaurants.create') }}" class="text-decoration-none text-white">CREA UN NUOVO
                    RISTORANTE</a>
            </button>
        </div>

        <div class="my-5 row gap-4 flex-wrap">
            @foreach ($restaurants as $restaurant)
                <div class="col">
                    <div class="card rounded-3" style="width:18rem;">
                        @if (str_contains($restaurant->image, 'http'))
                            <img src="{{ $restaurant->image }}" class="rounded-top-3">
                        @else
                            <img class="rounded-top-3" src="{{ asset('storage/' . $restaurant->image) }}" alt="..">
                        @endif
                        <div class="card-body">
                            <h5 class="card-title">{{ $restaurant->name }}</h5>
                            <h6 class="card-subtitle mb-2 text-muted ">{{ $restaurant->address }}</h6>
                            <p class="card-text">{{ $restaurant->description }}</p>
                            <ul class="d-flex flex-wrap gap-1 list-unstyled">
                                @foreach ($restaurant->types as $type)
                                    <li class="badge bg_color">
                                        {{ $type->name }}
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                        <div class=" card-footer">
                            <div class="buttons d-flex justify-content-between">
                                <a class="btn btn-primary" href="{{ route('admin.restaurants.show', $restaurant) }}">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                        fill="currentColor" class="bi bi-list" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd"
                                            d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5m0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5m0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5" />
                                    </svg>
                                    Menu
                                </a>
                                <a class="btn btn-warning" href="{{ route('admin.restaurants.edit', $restaurant->slug) }}">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                        fill="currentColor" class="bi bi-pencil" viewBox="0 0 16 16">
                                        <path
                                            d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z" />
                                    </svg>
                                    Modifica
                                </a>

                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                    data-bs-target="#exampleModal_{{ $restaurant->id }}">
                                    <i class="fa-solid fa-trash"></i>
                                </button>

                                <!-- Modal -->
                                <div class="modal fade" id="exampleModal_{{ $restaurant->id }}" tabindex="-1"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="exampleModalLabel">Elimina il
                                                    ristorante
                                                </h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                Sei sicuro di voler eliminare questo ristorante?
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Annulla</button>
                                                <form action="{{ route('admin.restaurants.destroy', $restaurant) }}"
                                                    method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger">Elimina</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
