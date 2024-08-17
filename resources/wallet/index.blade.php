@extends('layouts.app')

@section('content')
<div class="container">
    <h2>My Wallet</h2>
    <p>Balance: ${{ number_format($wallet->balance, 2) }}</p>

    <form action="{{ route('wallet.addFunds') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="amount">Add Funds</label>
            <input type="number" name="amount" id="amount" class="form-control" step="0.01" min="0.01" required>
        </div>
        <button type="submit" class="btn btn-primary">Add Funds</button>
    </form>

    <form action="{{ route('wallet.withdrawFunds') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="amount">Withdraw Funds</label>
            <input type="number" name="amount" id="amount" class="form-control" step="0.01" min="0.01" required>
        </div>
        <button type="submit" class="btn btn-danger">Withdraw Funds</button>
    </form>

    <form action="{{ route('wallet.payForRide') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="ride_id">Ride ID</label>
            <input type="text" name="ride_id" id="ride_id" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="amount">Amount</label>
            <input type="number" name="amount" id="amount" class="form-control" step="0.01" min="0.01" required>
        </div>
        <button type="submit" class="btn btn-success">Pay for Ride</button>
    </form>

    <h3>Transaction History</h3>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Type</th>
                <th>Amount</th>
                <th>Description</th>
                <th>Created At</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($transactions as $transaction)
                <tr>
                    <td>{{ $transaction->type }}</td>
                    <td>${{ number_format($transaction->amount, 2) }}</td>
                    <td>{{ $transaction->description }}</td>
                    <td>{{ $transaction->created_at->format('d/m/Y H:i') }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
