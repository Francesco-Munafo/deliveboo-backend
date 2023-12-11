@extends('layouts.admin')

@section('content')
    <div class="container my-3">
        <div class="row justify-content-around">
            <div class="d-none d-xl-flex align-items-center col-5">
                <img class="img-fluid" src="{{ asset('img/logo.png') }}" alt="logo">
            </div>

            <form class="form col-12 col-md-9 col-xl-5 px-5 d-flex flex-column justify-content-center" method="POST"
                action="{{ route('register') }}">

                @csrf
                <span class="signup">Registrazione</span>

                <input id="name" type="text" placeholder="Nome e cognome"
                    class="form--input
                    @error('name') is-invalid mb-0 @enderror" name="name"
                    value="{{ old('name') }}" required autocomplete="name" autofocus>
                @error('name')
                    <span class="invalid-feedback mb-2" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror

                <input id="email" type="email" placeholder="Indirizzo Email"
                    class="form--input
                    @error('email') is-invalid mb-0 @enderror" name="email"
                    value="{{ old('email') }}" required autocomplete="email" autofocus>
                @error('email')
                    <span class="invalid-feedback mb-2" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror

                <input id="vat_number" type="text" placeholder="Partita IVA"
                    class="form--input
                    @error('vat_number') is-invalid mb-0 @enderror" name="vat_number"
                    value="{{ old('vat_number') }}" required autocomplete="vat_number" autofocus>
                @error('vat_number')
                    <span class="invalid-feedback mb-2" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror

                <input id="password" type="password" placeholder="Password" class="form--input" name="password" required
                    autocomplete="current-password">

                <input id="password-confirm" type="password" placeholder="Conferma password"
                    class="form--input
                    @error('password-confirm') is-invalid mb-0 @enderror @error('password') is-invalid mb-0 @enderror"
                    name="password-confirm" value="{{ old('password-confirm') }}" required autocomplete="new-password"
                    autofocus>
                @error('password-confirm')
                    <span class="invalid-feedback mb-2" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                @error('password')
                    <span class="invalid-feedback mb-2" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror



                <button class="form--submit mt-2" type="submit">
                    Accedi
                </button>

                <span style="font-size: 13px;" class="mt-2">
                    Hai già un account su DeliveBoo?
                    <a class="text-decoration-none text-black" href="{{ route('login') }}"><strong>Accedi</strong></a>
                </span>
            </form>

        </div>
    </div>
@endsection



<style lang="scss" scoped>
    .form {
        padding: 3.125em;
        border-radius: 30px;
        display: flex;
        flex-direction: column;
        align-items: center;
        background-color: rgba(255, 255, 255, 0.1);
        box-shadow: 0 8px 32px 0 rgba(31, 38, 135, 0.2);
    }

    .signup {
        color: rgb(77, 75, 75);
        text-transform: uppercase;
        letter-spacing: 2px;
        display: block;
        font-weight: bold;
        font-size: x-large;
        margin-bottom: 0.5em;
    }

    .form--input {
        width: 100%;
        margin-bottom: 1.25em;
        height: 40px;
        border-radius: 5px;
        border: 1px solid gray;
        padding: 0.8em;
        outline: none;
    }

    .form--input:focus {
        border: 1px solid #3d348b;
        box-shadow: 0 0 10px #3d348b8a;
        outline: none;
    }

    .form--marketing {
        display: flex;
        margin-bottom: 1.25em;
        align-items: center;
    }

    .form--marketing>input {
        margin-right: 0.625em;
    }

    .form--marketing>label {
        color: grey;
    }

    .checkbox,
    input[type="checkbox"] {
        accent-color: #3d348b;
    }

    .form--submit {
        width: 50%;
        padding: 0.625em;
        border-radius: 5px;
        color: white;
        background-color: #3d348b;
        border: 1px dashed #3d348b;
        cursor: pointer;
    }

    .form--submit:hover {
        box-shadow: 0px 0px 15px #534e81;
        background-color: white;
        border: #3d348b;
        color: #3d348b;
        font-weight: bold;
        cursor: pointer;
        transition: 0.5s;
    }
</style>
