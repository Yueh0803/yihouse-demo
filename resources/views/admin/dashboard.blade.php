@extends('admin.layout')

@section('admin-title', '儀表板')

@section('admin-content')
<div class="grid grid-cols-1 md:grid-cols-5 gap-4 mb-8">
    <div class="bg-white rounded-lg shadow p-6">
        <h3 class="text-gray-500 text-sm">總會員數</h3>
        <p class="text-3xl font-bold text-matsu-pink">{{ $total_members ?? 0 }}</p>
    </div>
    <div class="bg-white rounded-lg shadow p-6">
        <h3 class="text-gray-500 text-sm">房間數</h3>
        <p class="text-3xl font-bold text-matsu-pink">{{ $total_rooms ?? 0 }}</p>
    </div>
    <div class="bg-white rounded-lg shadow p-6">
        <h3 class="text-gray-500 text-sm">訂單總數</h3>
        <p class="text-3xl font-bold text-matsu-pink">{{ $total_orders ?? 0 }}</p>
    </div>
    <div class="bg-white rounded-lg shadow p-6">
        <h3 class="text-gray-500 text-sm">待處理訂單</h3>
        <p class="text-3xl font-bold text-orange-500">{{ $pending_orders ?? 0 }}</p>
    </div>
    <div class="bg-white rounded-lg shadow p-6">
        <h3 class="text-gray-500 text-sm">系統使用者</h3>
        <p class="text-3xl font-bold text-matsu-pink">{{ $total_users ?? 0 }}</p>
    </div>
</div>

<div class="bg-white rounded-lg shadow p-6">
    <h2 class="text-xl font-bold mb-4">快速操作</h2>
    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
        <a href="{{ route('admin.users.index') }}" class="block bg-blue-50 border-2 border-blue-200 p-4 rounded hover:shadow-md">
            <h3 class="font-bold text-blue-800">查看會員</h3>
            <p class="text-sm text-gray-600">管理所有會員帳號</p>
        </a>
        <a href="{{ route('admin.rooms.index') }}" class="block bg-green-50 border-2 border-green-200 p-4 rounded hover:shadow-md">
            <h3 class="font-bold text-green-800">管理房間</h3>
            <p class="text-sm text-gray-600">編輯房間資訊</p>
        </a>
        <a href="{{ route('admin.orders.index') }}" class="block bg-purple-50 border-2 border-purple-200 p-4 rounded hover:shadow-md">
            <h3 class="font-bold text-purple-800">訂單一覽</h3>
            <p class="text-sm text-gray-600">檢視所有訂單</p>
        </a>
    </div>
</div>
@endsection
