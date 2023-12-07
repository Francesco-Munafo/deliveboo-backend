@extends('layouts.admin')

@section('content')
    <div class="container my-5">

        <div class="d-flex gap-5 flex-column">

            <div class="card" style="width:18rem;">
                @if (str_contains($restaurant->image, 'http'))
                    <img src="{{ $restaurant->image }}">
                @else
                    <img src="{{ asset('storage/' . $restaurant->image) }}" alt="..">
                @endif
                <div class="card-body">
                    <h5 class="card-title">{{ $restaurant->name }}</h5>
                    <h6 class="card-subtitle mb-2 text-muted ">{{ $restaurant->address }}</h6>
                    <p class="card-text">{{ $restaurant->description }}</p>
                    <ul class="d-flex flex-wrap gap-1 list-unstyled">
                        @forelse ($restaurant->types as $type)
                            <li class="badge bg_color">
                                {{ $type->name }}
                            </li>
                        @empty
                            <li class="badge bg-secondary">NESSUNA</li>
                        @endforelse
                    </ul>
                </div>
                <div class=" card-footer">
                    <div class="buttons d-flex justify-content-center gap-2">
                        <a class="btn btn-warning" href="{{ route('admin.restaurants.edit', $restaurant->slug) }}">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                class="bi bi-pencil" viewBox="0 0 16 16">
                                <path
                                    d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z" />
                            </svg>
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
                                        <form action="{{ route('admin.restaurants.destroy', $restaurant) }}" method="POST">
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

            <div>

                <h2>PIATTI</h2>

                <button class="btn btn-success my-3">
                    <a href="{{ route('admin.restaurant.dishes.create', $restaurant->id) }}"
                        class="text-decoration-none text-dark">CREA
                        UN NUOVO PIATTO</a>
                </button>

                <div class="d-flex flex-wrap gap-2">
                    @foreach ($dishes as $dish)
                        <div class="card" style="width: 15rem;">
                            @if (str_contains($dish->image, 'http'))
                                <img src="{{ $dish->image }}">
                            @else
                                <img src="{{ asset('storage/' . $dish->image) }}" alt="..">
                            @endif
                            <div class="card-body">
                                <h4 class="card-title">{{ $dish->name }}</h4>
                                <span class="card-title">
                                    PORTATA:
                                    @switch($dish->course)
                                        @case(1)
                                            Primo piatto
                                        @break

                                        @case(2)
                                            Secondo piatto
                                        @break

                                        @case(3)
                                            Dolce
                                        @break

                                        @case(4)
                                            Antipasto
                                        @break

                                        @case(5)
                                            Contorno
                                        @break

                                        @case(6)
                                            Frutta
                                        @break

                                        @case(7)
                                            Bibita
                                        @break

                                        @default
                                    @endswitch
                                </span> <br>
                                <span class="card-title"><strong>PREZZO: {{ $dish->price }}€</strong></span> <br>
                                <span class="card-title">
                                    @if ($dish->available)
                                        <em>DISPONIBILE</em>
                                    @else
                                        <em>ESAURITO</em>
                                    @endif
                                </span> <br>
                                <p class="card-text my-4">DESCRIZIONE: {{ $dish->description }}</p>
                                <span class="card-title">INGREDIENTI: {{ $dish->ingredients }}</span> <br>
                            </div>

                            <div class=" card-footer">
                                <div class="buttons d-flex justify-content-between">
                                    <a class="btn btn-primary"
                                        href="{{ route('admin.restaurant.dishes.show', [$restaurant, $dish]) }}">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            fill="currentColor" class="bi bi-eye" viewBox="0 0 16 16">
                                            <path
                                                d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8M1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z" />
                                            <path
                                                d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5M4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0" />
                                        </svg>
                                    </a>
                                    <a class="btn btn-warning"
                                        href="{{ route('admin.restaurant.dishes.edit', [$restaurant, $dish]) }}">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            fill="currentColor" class="bi bi-pencil" viewBox="0 0 16 16">
                                            <path
                                                d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z" />
                                        </svg>
                                    </a>

                                    <!-- Button trigger modal -->
                                    <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                        data-bs-target="#exampleModal_{{ $dish->id }}">
                                        <i class="fa-solid fa-trash"></i>
                                    </button>

                                    <!-- Modal -->
                                    <div class="modal fade" id="exampleModal_{{ $dish->id }}" tabindex="-1"
                                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Elimina il
                                                        piatto
                                                    </h1>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    Sei sicuro di voler eliminare questo piatto?
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">Annulla</button>
                                                    <form
                                                        action="{{ route('admin.restaurant.dishes.destroy', [$restaurant, $dish]) }}"
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
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
