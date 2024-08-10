<!DOCTYPE html>
<html>
<head>
    <title>{{ $blogPost->title }}</title>
</head>
<body>
    <h1>{{ $blogPost->title }}</h1>
    <p>{{ $blogPost->content }}</p>
    @if ($blogPost->vehicle)
        <img src="{{ asset('storage/' . $blogPost->vehicle->photo_vehicle) }}" alt="Vehicle Photo">
        <p>Vehicle: {{ $blogPost->vehicle->make }} {{ $blogPost->vehicle->model }}</p>
    @endif
</body>
</html>
