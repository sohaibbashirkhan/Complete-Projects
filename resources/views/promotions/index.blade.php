<!-- resources/views/promotions/index.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Promotions</title>
    <style>
        /* Basic styling */
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 800px;
            margin: 20px auto;
            padding: 20px;
            background: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h1 {
            text-align: center;
            color: #333;
        }
        .promo-list ul {
            list-style-type: none;
            padding: 0;
        }
        .promo-list li {
            padding: 10px;
            border-bottom: 1px solid #ddd;
        }
        .apply-promo {
            margin-top: 20px;
            background-color: #f9f9f9;
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 4px;
        }
        .apply-promo input[type="text"], .apply-promo button {
            width: 100%;
            padding: 10px;
            margin: 5px 0;
        }
        .apply-promo button {
            background-color: #4CAF50;
            color: #fff;
            border: none;
            cursor: pointer;
        }
        .apply-promo button:hover {
            background-color: #45a049;
        }
        .result {
            margin-top: 20px;
        }
        .result p {
            font-size: 1.2em;
            color: #333;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Promotional Offers</h1>

        <!-- List of Promotions -->
        <div class="promo-list">
            <h2>Available Promotions</h2>
            <ul>
                @foreach($promotions as $promotion)
                    <li>{{ $promotion->code }}: {{ $promotion->description }} - {{ $promotion->discount }}% off</li>
                @endforeach
            </ul>
        </div>

        <!-- Apply Promotion -->
        <div class="apply-promo">
            <h2>Apply Promo Code</h2>
            <form action="{{ route('promotions.apply') }}" method="POST">
                @csrf
                <label for="promo_code">Promo Code:</label>
                <input type="text" id="promo_code" name="promo_code" required>
                <button type="submit">Apply Code</button>
                @if(session('success'))
                    <p style="color: green;">{{ session('success') }}</p>
                @endif
                @if($errors->any())
                    <p style="color: red;">{{ $errors->first() }}</p>
                @endif
            </form>
        </div>
    </div>
</body>
</html>
