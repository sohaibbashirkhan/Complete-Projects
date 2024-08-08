@extends('layouts.app')

@section('content')
    <h1>Search Results</h1>
    @if($cars->isEmpty())
        <p>No cars found.</p>
    @else
        <ul>
            @foreach($cars as $car)
                <li>{{ $car->name }}</li>
            @endforeach
        </ul>
    @endif
@endsection