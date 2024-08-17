<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use Illuminate\Support\Facades\Mail;
use App\Mail\PaymentLinkMail;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::all();
        return view('admin.orders.index', compact('orders'));
    }

    public function generatePaymentLink($id)
    {
        $order = Order::findOrFail($id);
        $amount = $order->amount;
        $paymentLink = $this->createPaymentLink($amount);
        Mail::to($order->customer->email)->send(new PaymentLinkMail($paymentLink, $order));
        return redirect()->route('admin.orders.index')->with('success', 'Payment link sent successfully.');
    }

    protected function createPaymentLink($amount)
    {
        return 'https://example.com/payment-link'; // Placeholder
    }
}
