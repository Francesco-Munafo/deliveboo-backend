<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>
        Ciao Admin!
    </h1>

    <p>
        Hai ricevuto un nuovo ordine da: <br>
        Nome e cognome: {{ $lead->name }} {{ $lead->surname }} <br>
        Email: {{ $lead->email }} <br>
        Telefono: {{ $lead->phone }}
    </p>

    <br>

    <p>
        Il cibo da spedire a: <br>
        Città: {{ $lead->city }} <br>
        Codice fiscale: {{ $lead->postal_code }} <br>
        Indirizzo: {{ $lead->address }} <br>
        @if ($lead->home)
            Casa: {{ $lead->home }}
        @endif
    </p>

    @if ($lead->message)
        <p>
            Message: <br>
            {{ $lead->message }}
        </p>
    @endif
</body>

</html>
