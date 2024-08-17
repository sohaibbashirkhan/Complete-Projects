@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Add New Rating</h2>
    <form action="{{ route('dashboard.rating.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="booking_id">Booking</label>
            <select name="booking_id" id="booking_id" class="form-control" required>
                @foreach($bookings as $booking)
                    <option value="{{ $booking->id }}">{{ $booking->id }} - {{ $booking->car->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="rating">Rating (1-5)</label>
            <select name="rating" id="rating" class="form-control" required>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
            </select>
        </div>

        <div class="form-group">
            <label for="review">Review (optional)</label>
            <textarea name="review" id="review" class="form-control" rows="4"></textarea>
        </div>

        <button type="submit" class="btn btn-primary">Submit Rating</button>
    </form>
</div>
@endsection
