@extends('layouts.app')

@section('title', '預訂房間')

@section('content')
<div class="max-w-2xl mx-auto px-4 py-8">
    <h1 class="text-3xl font-bold mb-8 text-matsu-pink">訂房確認</h1>

    <div class="bg-white rounded-lg shadow-lg p-8">
        <div class="border-b pb-6 mb-6">
            <h2 class="text-2xl font-bold mb-4">房間資訊</h2>
            <div class="grid grid-cols-2 gap-4">
                <div>
                    <p class="text-gray-600">房間名稱</p>
                    <p class="font-bold text-lg">{{ $room->room_name }}</p>
                </div>
                <div>
                    <p class="text-gray-600">價格</p>
                    <p class="font-bold text-lg text-matsu-pink">NT$ {{ number_format($room->price_per_night) }}/晚</p>
                </div>
            </div>
        </div>

        <form action="{{ route('booking.store') }}" method="POST">
            @csrf
            <input type="hidden" name="room_id" value="{{ $room->id }}">

            <div class="mb-6">
                <h2 class="text-2xl font-bold mb-4">預訂日期</h2>
                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700">入住日期</label>
                        <input type="date" name="check_in_date" required class="mt-1 p-2 w-full border border-gray-300 rounded-md">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700">退住日期</label>
                        <input type="date" name="check_out_date" required class="mt-1 p-2 w-full border border-gray-300 rounded-md">
                    </div>
                </div>
            </div>

            <div class="bg-gray-50 p-4 rounded-lg mb-6">
                <h3 class="font-bold mb-2">價格明細</h3>
                <div class="flex justify-between mb-2">
                    <span>日期差 (天)</span>
                    <span id="nights">0</span>
                </div>
                <div class="flex justify-between text-lg font-bold border-t pt-2">
                    <span>總計</span>
                    <span class="text-matsu-pink">NT$ <span id="totalPrice">0</span></span>
                </div>
            </div>

            <button type="submit" class="w-full bg-matsu-pink text-white py-3 rounded-md hover:bg-opacity-90 font-bold text-lg">
                繼續付款
            </button>
        </form>
    </div>
</div>

<script>
function updatePrice() {
    const checkIn = new Date(document.querySelector('input[name="check_in_date"]').value);
    const checkOut = new Date(document.querySelector('input[name="check_out_date"]').value);
    const nights = (checkOut - checkIn) / (1000 * 60 * 60 * 24);
    const pricePerNight = {{ $room->price_per_night }};
    const totalPrice = nights * pricePerNight;
    
    document.getElementById('nights').textContent = nights;
    document.getElementById('totalPrice').textContent = Math.round(totalPrice).toLocaleString();
}

document.querySelectorAll('input[type="date"]').forEach(input => {
    input.addEventListener('change', updatePrice);
});
</script>
@endsection
