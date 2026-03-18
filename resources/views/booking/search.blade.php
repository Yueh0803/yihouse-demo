@extends('layouts.app')

@section('title', '訂房搜尋')

@section('content')
<div class="max-w-7xl mx-auto px-4 py-8">
    <h1 class="text-4xl font-bold mb-8 text-matsu-pink">尋找理想房間</h1>

    <div class="bg-white rounded-lg shadow-lg p-8 mb-8">
        <h2 class="text-2xl font-bold mb-4">搜尋條件</h2>
        <form id="searchForm" class="grid grid-cols-1 md:grid-cols-4 gap-4">
            <div>
                <label class="block text-sm font-medium text-gray-700">入住日期</label>
                <input type="date" id="checkIn" required class="mt-1 p-2 w-full border border-gray-300 rounded-md">
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700">退住日期</label>
                <input type="date" id="checkOut" required class="mt-1 p-2 w-full border border-gray-300 rounded-md">
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700">房間類型</label>
                <select id="roomType" class="mt-1 p-2 w-full border border-gray-300 rounded-md">
                    <option value="">-- 不限 --</option>
                    <option value="single">單人房</option>
                    <option value="double">雙人房</option>
                    <option value="suite">套房</option>
                </select>
            </div>
            <div class="flex items-end">
                <button type="submit" class="w-full bg-matsu-pink text-white py-2 rounded-md hover:bg-opacity-90">
                    搜尋
                </button>
            </div>
        </form>
    </div>

    <div id="results" class="grid grid-cols-1 md:grid-cols-3 gap-6">
        @foreach ($rooms as $room)
            <div class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-lg transition">
                <div class="h-40 bg-gray-300 flex items-center justify-center">
                    <span class="text-gray-500">房間照片</span>
                </div>
                <div class="p-4">
                    <h3 class="font-bold text-lg mb-2">{{ $room->room_name }}</h3>
                    <p class="text-gray-600 mb-2">{{ $room->room_type }} - 容納 {{ $room->capacity }} 人</p>
                    <p class="text-matsu-pink font-bold mb-4">NT$ {{ number_format($room->price_per_night) }}/晚</p>
                    <a href="{{ route('booking.create', $room->id) }}" class="block text-center bg-matsu-pink text-white py-2 rounded-md hover:bg-opacity-90">
                        預訂此房間
                    </a>
                </div>
            </div>
        @endforeach
    </div>
</div>

<script>
document.getElementById('searchForm').addEventListener('submit', function(e) {
    e.preventDefault();
    const checkIn = document.getElementById('checkIn').value;
    const checkOut = document.getElementById('checkOut').value;
    
    // TODO: Fetch available rooms based on dates
    console.log('搜尋: 入住', checkIn, '退住', checkOut);
});
</script>
@endsection
