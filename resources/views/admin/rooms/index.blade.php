@extends('admin.layout')

@section('admin-title', '房間管理')

@section('admin-content')
<div class="bg-white rounded-lg shadow p-6">
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-2xl font-bold">房間列表</h2>
        <a href="{{ route('admin.rooms.create') }}" class="bg-matsu-pink text-white px-4 py-2 rounded-md hover:bg-opacity-90">
            + 新增房間
        </a>
    </div>

    @if ($rooms->count() > 0)
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach ($rooms as $room)
                <div class="border rounded-lg p-4 hover:shadow-lg transition">
                    <h3 class="font-bold text-lg mb-2">{{ $room->room_name }}</h3>
                    <p class="text-gray-600 mb-2">{{ $room->room_type }}</p>
                    <p class="text-matsu-pink font-bold mb-2">NT$ {{ number_format($room->price_per_night) }}/晚</p>
                    <p class="text-sm text-gray-700 mb-4">容納人數: {{ $room->capacity }} 人</p>
                    <div class="flex gap-2">
                        <a href="{{ route('admin.rooms.edit', $room->id) }}" class="flex-1 bg-blue-600 text-white px-3 py-1 rounded text-center text-sm hover:bg-blue-700">
                            編輯
                        </a>
                        <form action="{{ route('admin.rooms.destroy', $room->id) }}" method="POST" class="flex-1">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="w-full bg-red-600 text-white px-3 py-1 rounded text-sm hover:bg-red-700" onclick="return confirm('確認刪除?')">
                                刪除
                            </button>
                        </form>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="mt-4">
            {{ $rooms->links() }}
        </div>
    @else
        <p class="text-gray-600">尚無房間記錄</p>
    @endif
</div>
@endsection
