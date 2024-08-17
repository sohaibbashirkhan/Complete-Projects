<?php
namespace App\Http\Controllers;

use App\Models\Wallet;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WalletController extends Controller
{
    public function index()
    {
        // Fetch the wallet for the authenticated user
        $wallet = Wallet::where('user_id', Auth::id())->first();

        // Check if the wallet exists
        if (!$wallet) {
            // Handle the case when the wallet does not exist
            // You can either create a new wallet or show an error message
            return redirect()->back()->withErrors('Wallet not found.');
        }

        // Fetch transactions related to the wallet
        $transactions = $wallet->transactions()->latest()->get();

        return view('wallet.index', compact('wallet', 'transactions'));
    }

    public function addFunds(Request $request)
    {
        $request->validate([
            'amount' => 'required|numeric|min:0.01'
        ]);

        // Create or fetch the wallet for the authenticated user
        $wallet = Wallet::firstOrCreate(['user_id' => Auth::id()]);

        // Add funds to the wallet
        $wallet->balance += $request->amount;
        $wallet->save();

        // Create a transaction record
        Transaction::create([
            'wallet_id' => $wallet->id,
            'amount' => $request->amount,
            'type' => 'credit', // or 'debit' depending on your use case
            'description' => 'Added funds'
        ]);

        return redirect()->route('wallet.index')->with('success', 'Funds added successfully.');
    }
}
