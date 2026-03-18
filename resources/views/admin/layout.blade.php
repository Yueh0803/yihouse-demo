@extends('layouts.app')

@section('title', '後台管理')

@section('content')
<div class="flex h-screen bg-gray-100">
    <!-- 側邊欄 -->
    <div class="w-64 bg-white shadow-lg">
        <div class="p-6 border-b">
            <h2 class="text-xl font-bold text-matsu-pink">管理後台</h2>
        </div>
        <nav class="mt-6 space-y-2">
            <a href="{{ route('admin.dashboard') }}" class="block px-4 py-2 text-gray-700 hover:bg-gray-100">📊 儀表板</a>
            <a href="{{ route('admin.implementations') }}" class="block px-4 py-2 text-gray-700 hover:bg-gray-100">⚙️ 系統實作</a>
            <a href="{{ route('admin.users.index') }}" class="block px-4 py-2 text-gray-700 hover:bg-gray-100">👥 會員管理</a>
            <a href="{{ route('admin.iot') }}" class="block px-4 py-2 text-gray-700 hover:bg-gray-100">🔧 IOT 智慧</a>
            <a href="{{ route('admin.maintenance') }}" class="block px-4 py-2 text-gray-700 hover:bg-gray-100">🧹 房務維護</a>
            <a href="{{ route('admin.rooms.index') }}" class="block px-4 py-2 text-gray-700 hover:bg-gray-100">🏠 房間管理</a>
            <a href="{{ route('admin.orders.index') }}" class="block px-4 py-2 text-gray-700 hover:bg-gray-100">📋 訂單管理</a>
            <a href="{{ route('admin.payments.index') }}" class="block px-4 py-2 text-gray-700 hover:bg-gray-100">💳 金流管理</a>
        </nav>
    </div>

    <!-- 主內容 -->
    <div class="flex-1 flex flex-col overflow-hidden">
        <!-- 頂部欄 -->
        <div class="bg-white shadow">
            <div class="px-6 py-4 flex justify-between items-center">
                <h1 class="text-2xl font-bold text-gray-800">@yield('admin-title', '儀表板')</h1>
                <div class="flex items-center space-x-4">
                    <span class="text-gray-700">{{ auth()->user()->name }}</span>
                    <form action="{{ route('logout') }}" method="POST" class="inline">
                        @csrf
                        <button class="text-red-600 hover:text-red-800">登出</button>
                    </form>
                </div>
            </div>
        </div>

        <!-- 內容區 -->
        <div class="flex-1 overflow-auto p-6">
            @yield('admin-content')
        </div>
    </div>
</div>
@endsection
