@extends('layouts.app')

@section('content')
<h1>Lista de vuelos</h1>
<table border="1">
    @if(count($flights) > 0)
    @foreach($flights as $flight)
    <tr>
        <td>{{$flight->name}}</td>
        <td>{{$flight->origin}}</td>
        <td>{{$flight->destiny}}</td>
        <td>{{$flight->date}}</td>
        <td>{{$flight->available_seats}}</td>
    </tr>
    @endforeach
    @endif
</table>
@endsection