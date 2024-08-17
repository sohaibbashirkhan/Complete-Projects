@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Rate Your Ride</h2>
    <p>How was your ride with <strong>{{ $ride->user->name }}</strong>?</p>

    <form action="{{ route('ratings.store') }}" method="POST">
        @csrf
        <input type="hidden" name="ride_id" value="{{ $ride->id }}">

        <div class="form-group">
            <div class="star-rating">
                <input type="radio" name="rating" value="5" id="5" required>
                <label for="5">&#9733;</label>
                <input type="radio" name="rating" value="4" id="4">
                <label for="4">&#9733;</label>
                <input type="radio" name="rating" value="3" id="3">
                <label for="3">&#9733;</label>
                <input type="radio" name="rating" value="2" id="2">
                <label for="2">&#9733;</label>
                <input type="radio" name="rating" value="1" id="1">
                <label for="1">&#9733;</label>
            </div>
        </div>

        <div class="form-group">
            <textarea name="review" placeholder="Write your review here..." rows="4" style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 5px;"></textarea>
        </div>

        <button type="submit">Submit Rating</button>
    </form>
</div>
@endsection
