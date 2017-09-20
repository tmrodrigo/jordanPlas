<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <h1>Jordan Plas</h1>
    <h2>Mensaje de: {{ $client->name}}</h2>
    <p>
      <strong>Teléfono: </strong> {{ $client->phone}}<br>
      <strong>Email: </strong> {{ $client->email }}<br>
      <strong>Mensaje: </strong>{{ $client->email }}
    </p>
  </body>
</html>
