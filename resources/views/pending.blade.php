@extends('layouts.app')

@section('content')
<table border="1">
    <tr>
        <th>Nombre</th>
        <th>Fecha</th>
        <th>Origen</th>
        <th>Destino</th>
        <th>nº plazas</th>
    </tr>
    @foreach($flights as $flight)
    <tr>
        <td>{{$flight->name}}</td>
        <td>{{$flight->date}}</td>
        <td>{{$flight->origin}}</td>
        <td>{{$flight->destiny}}</td>
        <form >
            <td><input type="text" name="reserva" placeholder="Plazas a reservar"/></td>
            <td><input type="submit" value="reserva"/></td>
        </form>
    </tr>
    @endforeach
</table>
@endsection