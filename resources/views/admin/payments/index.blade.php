@extends('admin.layout')

@section('admin-title', '金流管理')

@section('admin-content')
<div class="space-y-6">
    <div class="bg-white rounded-lg shadow p-6">
        <h2 class="text-2xl font-bold mb-4">支付記錄</h2>
        <a href="{{ route('admin.payments.configure') }}" class="inline-block bg-matsu-pink text-white px-4 py-2 rounded-md mb-4">
            ⚙️ 設定金流
        </a>

        @if ($payments->count() > 0)
            <div class="overflow-x-auto">
                <table class="w-full">
                    <thead class="bg-gray-50 border-b">
                        <tr>
                            <th class="px-4 py-2 text-left">支付編號</th>
                            <th class="px-4 py-2 text-left">訂單編號</th>
                            <th class="px-4 py-2 text-left">金額</th>
                            <th class="px-4 py-2 text-left">支付方式</th>
                            <th class="px-4 py-2 text-left">支付狀態</th>
                            <th class="px-4 py-2 text-left">日期</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($payments as $payment)
                            <tr class="border-b hover:bg-gray-50">
                                <td class="px-4 py-2">#{{ $payment->id }}</td>
                                <td class="px-4 py-2">{{ $payment->order->order_number ?? 'N/A' }}</td>
                                <td class="px-4 py-2">NT$ {{ number_format($payment->amount) }}</td>
                                <td class="px-4 py-2">{{ ucfirst($payment->payment_method) }}</td>
                                <td class="px-4 py-2">
                                    <span class="px-2 py-1 rounded text-sm 
                                        {{ $payment->payment_status === 'completed' ? 'bg-green-100 text-green-700' : 'bg-yellow-100 text-yellow-700' }}">
                                        {{ $payment->payment_status }}
                                    </span>
                                </td>
                                <td class="px-4 py-2">{{ $payment->created_at->format('Y-m-d H:i') }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @else
            <p class="text-gray-600">尚無支付記錄</p>
        @endif
    </div>
</div>
@endsection
