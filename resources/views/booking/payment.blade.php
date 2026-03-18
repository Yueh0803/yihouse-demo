@extends('layouts.app')

@section('title', '選擇支付方式')

@section('content')
<div class="max-w-2xl mx-auto px-4 py-8">
    <h1 class="text-3xl font-bold mb-8 text-matsu-pink">選擇支付方式</h1>

    <div class="bg-white rounded-lg shadow-lg p-8">
        <div class="mb-8 p-4 bg-soft-pink rounded-lg">
            <p class="text-gray-700">訂單編號: {{ $order->order_number }}</p>
            <p class="font-bold text-lg text-matsu-pink">應付金額: NT$ {{ number_format($order->total_price) }}</p>
        </div>

        <div class="space-y-4">
            <!-- LINE Pay -->
            <form action="{{ route('payment.line-pay') }}" method="POST" class="border rounded-lg p-4 hover:shadow-md transition">
                @csrf
                <input type="hidden" name="order_id" value="{{ $order->id }}">
                <button type="submit" class="w-full text-left flex items-center justify-between p-4">
                    <div>
                        <h3 class="font-bold text-lg">LINE Pay</h3>
                        <p class="text-gray-600">使用 LINE Pay 支付</p>
                    </div>
                    <span class="text-2xl">→</span>
                </button>
            </form>

            <!-- 信用卡 -->
            <form action="{{ route('payment.credit-card') }}" method="POST" class="border rounded-lg p-4 hover:shadow-md transition">
                @csrf
                <input type="hidden" name="order_id" value="{{ $order->id }}">
                <button type="submit" class="w-full text-left flex items-center justify-between p-4">
                    <div>
                        <h3 class="font-bold text-lg">💳 信用卡</h3>
                        <p class="text-gray-600">Visa / Mastercard / JCB</p>
                    </div>
                    <span class="text-2xl">→</span>
                </button>
            </form>

            <!-- 銀行匯款 -->
            <form action="{{ route('payment.transfer') }}" method="POST" class="border rounded-lg p-4 hover:shadow-md transition">
                @csrf
                <input type="hidden" name="order_id" value="{{ $order->id }}">
                <button type="submit" class="w-full text-left flex items-center justify-between p-4">
                    <div>
                        <h3 class="font-bold text-lg">🏦 銀行匯款</h3>
                        <p class="text-gray-600">ATM 轉帳或銀行匯款</p>
                    </div>
                    <span class="text-2xl">→</span>
                </button>
            </form>
        </div>
    </div>
</div>
@endsection
