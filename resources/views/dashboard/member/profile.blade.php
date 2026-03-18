@extends('layouts.app')

@section('title', '會員個人資料')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="max-w-2xl mx-auto">
        <h1 class="text-3xl font-bold mb-8 text-matsu-pink">個人資料</h1>

        @if (session('success'))
            <div class="bg-green-50 border border-green-200 text-green-700 px-4 py-3 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        <div class="bg-white rounded-lg shadow-md p-8">
            <form action="{{ route('dashboard.member.update', $user->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700">會員編號</label>
                    <input type="text" value="{{ $user->member_number }}" disabled 
                        class="mt-1 p-2 w-full border border-gray-300 rounded-md bg-gray-50">
                </div>

                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700">姓名</label>
                    <input type="text" name="name" value="{{ $user->name }}" required 
                        class="mt-1 p-2 w-full border border-gray-300 rounded-md">
                </div>

                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700">電子郵件</label>
                    <input type="email" value="{{ $user->email }}" disabled 
                        class="mt-1 p-2 w-full border border-gray-300 rounded-md bg-gray-50">
                </div>

                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700">手機號碼</label>
                    <input type="tel" name="phone" value="{{ $user->phone ?? '' }}"  
                        class="mt-1 p-2 w-full border border-gray-300 rounded-md">
                </div>

                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700">出生日期</label>
                    <input type="date" name="birth_date" value="{{ $user->birth_date ?? '' }}"  
                        class="mt-1 p-2 w-full border border-gray-300 rounded-md">
                </div>

                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700">地址</label>
                    <input type="text" name="address" value="{{ $user->address ?? '' }}"  
                        class="mt-1 p-2 w-full border border-gray-300 rounded-md">
                </div>

                <button type="submit" class="bg-matsu-pink text-white px-6 py-2 rounded-md hover:bg-opacity-90">
                    保存更新
                </button>
            </form>
        </div>

        <div class="mt-8 bg-white rounded-lg shadow-md p-8">
            <h2 class="text-xl font-bold mb-4 text-gray-800">最近訂單</h2>
            <p class="text-gray-600"><a href="{{ route('dashboard.member.orders') }}" class="text-matsu-pink hover:underline">查看所有訂單 →</a></p>
        </div>
    </div>
</div>
@endsection
