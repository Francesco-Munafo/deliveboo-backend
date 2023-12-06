@extends('layouts.admin')

@section('content')
    <div class="container">
        <h2 class=" fw-bolder my-4">
            Ristoranti
        </h2>
        {{-- <div class="row justify-content-center mb-5">
            <div class="col">
                <div class="card">
                    <div class="card-header">{{ __('User Dashboard') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        {{ __('You are logged in!') }}
                    </div>
                </div>
            </div>
        </div> --}}

        <div class="my-4">
            <button class="btn bg_color ">
                <a href="{{ route('admin.restaurants.create') }}" class="text-decoration-none text-white">CREA UN NUOVO
                    RISTORANTE</a>
            </button>
        </div>

        <div class="d-flex gap-4 flex-wrap">
            @foreach ($restaurants as $restaurant)
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
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                    class="bi bi-eye" viewBox="0 0 16 16">
                                    <path
                                        d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8M1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z" />
                                    <path
                                        d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5M4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0" />
                                </svg>
                            </a>
                            <a class="btn btn-warning" href="{{ route('admin.restaurants.edit', $restaurant->slug) }}">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                    class="bi bi-pencil" viewBox="0 0 16 16">
                                    <path
                                        d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z" />
                                </svg>
                            </a>
                            <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                data-bs-target="#modalId-{{ $restaurant->id }}">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                    class="bi bi-trash3" viewBox="0 0 16 16">
                                    <path
                                        d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5ZM11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H2.506a.58.58 0 0 0-.01 0H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1h-.995a.59.59 0 0 0-.01 0H11Zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5h9.916Zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47ZM8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5Z" />
                                </svg>
                            </button>

                            <div class="modal fade" id="modalId-{{ $restaurant->id }}" tabindex="-1"
                                data-bs-backdrop="static" data-bs-keyboard="false" role="dialog"
                                aria-labelledby="modalTitleId-{{ $restaurant->id }}" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-sm"
                                    role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="modalTitleId-{{ $restaurant->id }}">
                                                Stai cancellando il tuo ristorante "{{ $restaurant->name }}"
                                            </h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            Sei sicuro di voler spostare il tuo ristorante nel cestino?
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Annulla</button>

                                            <form action="{{ route('admin.restaurants.destroy', $restaurant->slug) }}"
                                                method="POST">
                                                @csrf
                                                @method('DELETE')

                                                <button type="submit" class="btn btn-danger">Sposta nel cestino</button>

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
@endsection
