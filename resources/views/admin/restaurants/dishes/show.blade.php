@extends('layouts.admin')

@section('content')
    <div class="container my-5">

        <div class="d-flex gap-4">
            <div>
                <div class="d-flex flex-wrap gap-2">
                    <div class="card" style="width: 15rem;">
                        @if (str_contains($dish->image, 'http'))
                            <img src="{{ $dish->image }}">
                        @else
                            <img src="{{ asset('storage/' . $dish->image) }}" alt="..">
                        @endif
                        <div class="card-body">
                            <h4 class="card-title">{{ $dish->name }}</h4>
                            <span class="card-title">PORTATA:{{ $dish->course }}</span> <br>
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
                            <div class="buttons d-flex justify-content-center gap-2">
                                <a class="btn btn-warning" href="{{ route('admin.dishes.edit', $dish->slug) }}">
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
                                                    progetto
                                                </h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                Sei sicuro di voler eliminare questo progetto?
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Annulla</button>
                                                <form action="{{ route('admin.dishes.destroy', ['dish' => $dish->id]) }}"
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
            </div>
        </div>
    </div>
@endsection
