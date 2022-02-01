@extends('layouts.app')

@section('content')
<form method="POST" action="/asignar/store">
    @csrf
    @method('put')
    <span>Vuelos</span>
    <select name="flights">
        @foreach($flights as $flight)
        <option value="{{$flight->id}}">{{$flight->name}}</option>
        @endforeach
    </select>
    <span>Aviones</span>
    <select name="airplanes">
        @foreach($airplanes as $airplane)
        <option value="{{$airplane->id}}">{{$airplane->name}}</option>
        @endforeach
    </select>
    <input type="submit" value="asignar" />
</form>
<table border="1">
    @foreach($flights as $flight)
    @if($flight->airplane != null)
    <tr>
        <form method="POST" action="/remove/{{$flight->id}}">
            @csrf
            @method('delete')
            <td>{{$flight->name}}</td>
            <td>{{$flight->airplane->name}}</td>
            <td><input type="submit" value="eliminar"/></td>
        </form>
    </tr>
    @endif
    @endforeach
</table>
@endsection