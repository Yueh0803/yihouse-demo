@extends('layouts.app')

@section('title', '會員註冊')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="max-w-md mx-auto bg-white rounded-lg shadow-md p-8">
        <h1 class="text-2xl font-bold mb-6 text-center text-matsu-pink">易居空間 - 會員註冊</h1>
        
        @if ($errors->any())
            <div class="bg-red-50 border border-red-200 text-red-700 px-4 py-3 rounded mb-4">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('register.store') }}" method="POST" class="space-y-4">
            @csrf
            
            <div>
                <label class="block text-sm font-medium text-gray-700">姓名</label>
                <input type="text" name="name" value="{{ old('name') }}" required 
                    class="mt-1 p-2 w-full border border-gray-300 rounded-md focus:ring-matsu-pink">
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700">註冊方式</label>
                <select name="register_method" required class="mt-1 p-2 w-full border border-gray-300 rounded-md">
                    <option value="">-- 選擇 --</option>
                    <option value="email">Email 註冊</option>
                    <option value="phone">手機號註冊</option>
                </select>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700">電子郵件</label>
                <input type="email" name="email" value="{{ old('email') }}" required 
                    class="mt-1 p-2 w-full border border-gray-300 rounded-md focus:ring-matsu-pink">
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700">手機號碼</label>
                <input type="tel" name="phone" value="{{ old('phone') }}"  
                    class="mt-1 p-2 w-full border border-gray-300 rounded-md">
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700">密碼</label>
                <input type="password" name="password" required 
                    class="mt-1 p-2 w-full border border-gray-300 rounded-md focus:ring-matsu-pink">
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700">確認密碼</label>
                <input type="password" name="password_confirmation" required 
                    class="mt-1 p-2 w-full border border-gray-300 rounded-md focus:ring-matsu-pink">
            </div>

            <button type="submit" class="w-full bg-matsu-pink text-white py-2 rounded-md hover:bg-opacity-90">
                註冊
            </button>
        </form>

        <div class="mt-6 space-y-2">
            <button onclick="location.href='{{ route('login.google') }}'" 
                class="w-full bg-white border-2 border-gray-300 py-2 rounded-md hover:bg-gray-50">
                <span class="text-gray-700">🔍 Google 登入</span>
            </button>
            <button onclick="location.href='{{ route('login.line') }}'" 
                class="w-full bg-white border-2 border-gray-300 py-2 rounded-md hover:bg-gray-50">
                <span class="text-gray-700">LINE 登入</span>
            </button>
        </div>

        <p class="text-center mt-4 text-sm text-gray-600">
            已有帳號？ <a href="{{ route('login') }}" class="text-matsu-pink hover:underline">登入</a>
        </p>
    </div>
</div>
@endsection
