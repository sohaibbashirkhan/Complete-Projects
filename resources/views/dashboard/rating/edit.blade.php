@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Edit Rating</h2>
    <form action="{{ route('dashboard.rating.edit', $rating->id) }}" method="POST">
        @csrf
        @method('POST')

        <div class="form-group">
            <label for="rating">Rating (1-5)</label>
            <select name="rating" id="rating" class="form-control" required>
                <option value="1" {{ $rating->rating == 1 ? 'selected' : '' }}>1</option>
                <option value="2" {{ $rating->rating == 2 ? 'selected' : '' }}>2</option>
                <option value="3" {{ $rating->rating == 3 ? 'selected' : '' }}>3</option>
                <option value="4" {{ $rating->rating == 4 ? 'selected' : '' }}>4</option>
                <option value="5" {{ $rating->rating == 5 ? 'selected' : '' }}>5</option>
            </select>
        </div>

        <div class="form-group">
            <label for="review">Review (optional)</label>
            <textarea name="review" id="review" class="form-control" rows="4">{{ $rating->review }}</textarea>
        </div>

        <button type="submit" class="btn btn-primary">Update Rating</button>
    </form>
</div>
@endsection
