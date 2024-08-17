@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Ratings</h2>
    <a href="{{ route('dashboard.rating.add') }}" class="btn btn-primary">Add New Rating</a>
    <table class="table mt-3">
        <thead>
            <tr>
                <th>ID</th>
                <th>User</th>
                <th>Booking</th>
                <th>Rating</th>
                <th>Review</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($ratings as $rating)
                <tr>
                    <td>{{ $rating->id }}</td>
                    <td>{{ $rating->user->name }}</td>
                    <td>{{ $rating->booking->id }}</td>
                    <td>{{ $rating->rating }}</td>
                    <td>{{ $rating->review }}</td>
                    <td>
                        <a href="{{ route('dashboard.rating.edit', $rating->id) }}" class="btn btn-warning">Edit</a>
                        <a href="{{ route('dashboard.rating.delete', $rating->id) }}" class="btn btn-danger">Delete</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
