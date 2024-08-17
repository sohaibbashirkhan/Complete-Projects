<!DOCTYPE html>
<html>
<head>
    <title>Wallet</title>
</head>
<body>
    <h1>Wallet Balance: {{ $wallet->balance }}</h1>

    @if(session('success'))
        <p>{{ session('success') }}</p>
    @endif

    @if($errors->any())
        <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    <h2>Transactions</h2>
    <ul>
        @foreach($transactions as $transaction)
            <li>{{ $transaction->amount }} - {{ $transaction->type }} - {{ $transaction->description }}</li>
        @endforeach
    </ul>

    <form action="{{ route('wallet.addFunds') }}" method="POST">
        @csrf
        <input type="number" name="amount" step="0.01" min="0.01" required>
        <button type="submit">Add Funds</button>
    </form>
</body>
</html>
