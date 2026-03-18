@extends('layouts.app')

@section('title', '我的訂單')

@section('content')
<div class="max-w-7xl mx-auto px-4 py-8">
    <h1 class="text-3xl font-bold mb-8 text-matsu-pink">我的訂單</h1>

    @if (auth()->user()->orders->count() > 0)
        <div class="space-y-4">
            @foreach (auth()->user()->orders as $order)
                <div class="bg-white rounded-lg shadow p-6">
                    <div class="grid grid-cols-1 md:grid-cols-5 gap-4 items-center">
                        <div>
                            <p class="text-gray-600 text-sm">訂單編號</p>
                            <p class="font-bold">{{ $order->order_number }}</p>
                        </div>
                        <div>
                            <p class="text-gray-600 text-sm">房間</p>
                            <p class="font-bold">{{ $order->room->room_name }}</p>
                        </div>
                        <div>
                            <p class="text-gray-600 text-sm">入住日期</p>
                            <p class="font-bold">{{ $order->check_in_date->format('Y-m-d') }}</p>
                        </div>
                        <div>
                            <p class="text-gray-600 text-sm">金額</p>
                            <p class="font-bold text-matsu-pink">NT$ {{ number_format($order->total_price) }}</p>
                        </div>
                        <div class="text-right">
                            <span class="px-3 py-1 rounded text-sm 
                                {{ $order->status === 'confirmed' ? 'bg-green-100 text-green-700' : 'bg-yellow-100 text-yellow-700' }}">
                                {{ ucfirst($order->status) }}
                            </span>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @else
        <div class="bg-white rounded-lg shadow p-8 text-center">
            <p class="text-gray-600 mb-4">尚無訂單記錄</p>
            <a href="/booking/search" class="inline-block bg-matsu-pink text-white px-6 py-2 rounded-md">
                立即訂房
            </a>
        </div>
    @endif
</div>
@endsection
