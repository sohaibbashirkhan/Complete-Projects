@extends('layouts.app')

@section('content')
<div class="container">
    <h2>All Ratings</h2>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Ride</th>
                <th>Customer</th>
                <th>Driver</th>
                <th>Rating</th>
                <th>Review</th>
                <th>Created At</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($ratings as $rating)
                <tr>
                    <td>{{ $rating->ride->start_location }} to {{ $rating->ride->end_location }}</td>
                    <td>{{ $rating->customer->name }}</td>
                    <td>{{ $rating->driver->name }}</td>
                    <td>{{ $rating->rating }}</td>
                    <td>{{ $rating->review }}</td>
                    <td>{{ $rating->created_at->format('d/m/Y H:i') }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
