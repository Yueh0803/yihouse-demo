<?php

namespace App\Http\Controllers\Payment;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Payment;
use Illuminate\Support\Facades\Auth;

class PaymentController extends Controller
{
    public function processLinePay()
    {
        $order = Order::findOrFail(request('order_id'));
        
        if ($order->user_id != Auth::id()) {
            abort(403);
        }

        // TODO: Integrate with LINE Pay API
        $payment = Payment::create([
            'order_id' => $order->id,
            'amount' => $order->total_price,
            'payment_method' => 'line_pay',
            'payment_status' => 'processing',
        ]);

        return response()->json(['status' => 'processing', 'payment_id' => $payment->id]);
    }

    public function processCreditCard()
    {
        $order = Order::findOrFail(request('order_id'));
        
        if ($order->user_id != Auth::id()) {
            abort(403);
        }

        // TODO: Integrate with payment gateway
        $payment = Payment::create([
            'order_id' => $order->id,
            'amount' => $order->total_price,
            'payment_method' => 'credit_card',
            'payment_status' => 'processing',
        ]);

        return view('payment.credit-card', ['payment' => $payment, 'order' => $order]);
    }

    public function processTransfer()
    {
        $order = Order::findOrFail(request('order_id'));
        
        if ($order->user_id != Auth::id()) {
            abort(403);
        }

        $payment = Payment::create([
            'order_id' => $order->id,
            'amount' => $order->total_price,
            'payment_method' => 'bank_transfer',
            'payment_status' => 'pending_verification',
        ]);

        return view('payment.transfer', ['payment' => $payment, 'order' => $order]);
    }

    public function confirm($paymentId)
    {
        $payment = Payment::findOrFail($paymentId);
        $payment->update(['payment_status' => 'completed']);
        
        $payment->order->update(['payment_status' => 'paid', 'status' => 'confirmed']);

        return redirect()->route('dashboard.member.index')->with('success', '支付已完成');
    }
}
