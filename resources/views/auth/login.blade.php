@extends('layouts.app')

@section('title', '登入')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="max-w-md mx-auto bg-white rounded-lg shadow-md p-8">
        <h1 class="text-2xl font-bold mb-6 text-center text-matsu-pink">易居空間 - 登入</h1>
        
        @if ($errors->any())
            <div class="bg-red-50 border border-red-200 text-red-700 px-4 py-3 rounded mb-4">
                {{ $errors->first() }}
            </div>
        @endif

        <form action="{{ route('login') }}" method="POST" class="space-y-4">
            @csrf
            
            <div>
                <label class="block text-sm font-medium text-gray-700">電子郵件</label>
                <input type="email" name="email" required 
                    class="mt-1 p-2 w-full border border-gray-300 rounded-md focus:ring-matsu-pink">
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700">密碼</label>
                <input type="password" name="password" required 
                    class="mt-1 p-2 w-full border border-gray-300 rounded-md focus:ring-matsu-pink">
            </div>

            <button type="submit" class="w-full bg-matsu-pink text-white py-2 rounded-md hover:bg-opacity-90">
                登入
            </button>
        </form>

        <div class="mt-6 space-y-2">
            <button onclick="googleLogin()" 
                class="w-full bg-white border-2 border-gray-300 py-2 rounded-md hover:bg-gray-50">
                <span class="text-gray-700">🔍 Google 登入</span>
            </button>
            <button onclick="lineLogin()" 
                class="w-full bg-white border-2 border-gray-300 py-2 rounded-md hover:bg-gray-50">
                <span class="text-gray-700">LINE 登入</span>
            </button>
        </div>

        <p class="text-center mt-4 text-sm text-gray-600">
            尚無帳號？ <a href="{{ route('register') }}" class="text-matsu-pink hover:underline">立即註冊</a>
        </p>
    </div>
</div>

<script>
function googleLogin() {
    // TODO: Integrate Google OAuth
    alert('Google 登入功能待整合');
}

function lineLogin() {
    // TODO: Integrate LINE OAuth
    alert('LINE 登入功能待整合');
}
</script>
@endsection
