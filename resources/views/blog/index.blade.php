<!DOCTYPE html>
<html>
<head>
    <title>Blog Posts</title>
</head>
<body>
    <h1>Blog Posts</h1>
    @foreach ($blogPosts as $post)
        <div>
            <h2>{{ $post->title }}</h2>
            <p>{{ $post->content }}</p>
            @if ($post->vehicle)
                <img src="{{ asset('storage/' . $post->vehicle->photo_vehicle) }}" alt="Vehicle Photo">
                <p>Vehicle: {{ $post->vehicle->make }} {{ $post->vehicle->model }}</p>
            @endif
        </div>
    @endforeach
</body>
</html>
