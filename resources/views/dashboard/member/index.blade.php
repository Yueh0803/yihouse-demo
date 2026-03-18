@extends('layouts.app')

@section('title', '會員中心')

@section('content')
<div class="max-w-7xl mx-auto px-4 py-8">
    <div class="flex gap-8">
        <!-- 側邊選單 -->
        <div class="w-48 bg-white rounded-lg shadow p-4 h-fit">
            <nav class="space-y-2">
                <a href="{{ route('dashboard.member.profile') }}" class="block px-4 py-2 bg-matsu-pink text-white rounded">👤 個人資料</a>
                <a href="{{ route('dashboard.member.orders') }}" class="block px-4 py-2 text-gray-700 hover:bg-gray-100 rounded">📋 我的訂單</a>
                <a href="/booking/search" class="block px-4 py-2 text-gray-700 hover:bg-gray-100 rounded">🏠 繼續訂房</a>
            </nav>
        </div>

        <!-- 主內容 -->
        <div class="flex-1">
            @yield('member-content', 
                view('dashboard.member.profile', ['user' => auth()->user()])
            )
        </div>
    </div>
</div>
@endsection
