@extends('layouts.admin')

@section('content')
    <div class="py-5">
        <h1>ORDINI</h1>

        <ol>
            @foreach ($orders as $order)
                <li>{{ $order->username }}</li>
            @endforeach
        </ol>
    </div>
@endsection
