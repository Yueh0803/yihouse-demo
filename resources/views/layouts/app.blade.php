<!DOCTYPE html>
<html lang="zh-TW">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', '易居空間 - YIHOUSE')</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Noto+Sans+TC:wght@300;400;500;700&family=Noto+Serif+TC:wght@300;400;600&display=swap');
        body {
            font-family: 'Noto Sans TC', sans-serif;
            background-color: #fdfbf7;
            color: #333333;
        }
        :root {
            --supercar-pink: #e65c7b;
            --supercar-pink-hover: #d44968;
            --incense-gold: #d4af37;
            --soft-pink-bg: #fdf2f4;
        }
        .text-matsu-pink { color: var(--supercar-pink); }
        .border-matsu-pink { border-color: var(--supercar-pink); }
        .bg-soft-pink { background-color: var(--soft-pink-bg); }
    </style>
</head>
<body>
    <!-- 導覽欄 -->
    <header class="bg-white shadow-sm sticky top-0 z-50 border-b border-pink-100">
        <div class="max-w-7xl mx-auto px-4 py-4 flex justify-between items-center">
            <a href="/" class="flex items-center space-x-2">
                <span class="text-3xl text-incense-gold font-serif">印</span>
                <span class="font-bold text-matsu-pink">易居空間 YIHOUSE</span>
            </a>
            <nav class="flex items-center space-x-4">
                <a href="/booking/search" class="text-gray-700 hover:text-matsu-pink">訂房</a>
                @if (auth()->check())
                    <a href="{{ route('dashboard.member.index') }}" class="text-gray-700 hover:text-matsu-pink">會員中心</a>
                    @if (auth()->user()->role === 'admin' || auth()->user()->role === 'staff')
                        <a href="{{ route('admin.dashboard') }}" class="text-gray-700 hover:text-matsu-pink">後台管理</a>
                    @endif
                    <form action="{{ route('logout') }}" method="POST" class="inline">
                        @csrf
                        <button class="text-gray-700 hover:text-matsu-pink">登出</button>
                    </form>
                @else
                    <a href="{{ route('login') }}" class="text-gray-700 hover:text-matsu-pink">登入</a>
                    <a href="{{ route('register') }}" class="bg-matsu-pink text-white px-4 py-2 rounded-md">註冊</a>
                @endif
            </nav>
        </div>
    </header>

    <!-- 主內容 -->
    <main class="min-h-screen">
        @yield('content')
    </main>

    <!-- 頁腳 -->
    <footer class="bg-gray-800 text-white mt-12 py-8">
        <div class="max-w-7xl mx-auto px-4">
            <p class="text-center">© 2026 易居空間 YIHOUSE. All rights reserved.</p>
        </div>
    </footer>
</body>
</html>
