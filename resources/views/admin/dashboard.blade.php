@extends('layouts.admin')

@section('content')
    <div class="container">
        <h2 class="fs-4 text-secondary my-4">
            {{ __('Dashboard') }}
        </h2>
        <div class="row justify-content-center mb-5">
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
        </div>

        <div class="d-flex gap-4 flex-wrap">
            @foreach ($restaurants as $restaurant)
                <div class="card" style="width:18rem;">
                    <img src={{ $restaurant->image }} class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">{{ $restaurant->name }}</h5>
                        <h6 class="card-subtitle mb-2 text-muted ">{{ $restaurant->address }}</h6>
                        <p class="card-text">{{ $restaurant->description }}</p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
