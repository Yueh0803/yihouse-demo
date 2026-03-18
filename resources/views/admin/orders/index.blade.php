@extends('admin.layout')

@section('admin-title', '訂單管理')

@section('admin-content')
<div class="bg-white rounded-lg shadow p-6">
    <h2 class="text-2xl font-bold mb-6">訂單一覽</h2>

    @if ($orders->count() > 0)
        <div class="overflow-x-auto">
            <table class="w-full">
                <thead class="bg-gray-50 border-b">
                    <tr>
                        <th class="px-4 py-2 text-left">訂單編號</th>
                        <th class="px-4 py-2 text-left">會員名稱</th>
                        <th class="px-4 py-2 text-left">房間名稱</th>
                        <th class="px-4 py-2 text-left">入住日期</th>
                        <th class="px-4 py-2 text-left">總金額</th>
                        <th class="px-4 py-2 text-left">狀態</th>
                        <th class="px-4 py-2 text-left">操作</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($orders as $order)
                        <tr class="border-b hover:bg-gray-50">
                            <td class="px-4 py-2">{{ $order->order_number }}</td>
                            <td class="px-4 py-2">{{ $order->user->name }}</td>
                            <td class="px-4 py-2">{{ $order->room->room_name }}</td>
                            <td class="px-4 py-2">{{ $order->check_in_date->format('Y-m-d') }}</td>
                            <td class="px-4 py-2">NT$ {{ number_format($order->total_price) }}</td>
                            <td class="px-4 py-2">
                                <span class="px-2 py-1 rounded text-sm bg-blue-100 text-blue-700">
                                    {{ $order->status }}
                                </span>
                            </td>
                            <td class="px-4 py-2">
                                <a href="{{ route('admin.orders.detail', $order->id) }}" class="text-blue-600 hover:underline">詳情</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="mt-4">
            {{ $orders->links() }}
        </div>
    @else
        <p class="text-gray-600">尚無訂單記錄</p>
    @endif
</div>
@endsection
