@extends('admin.layout')

@section('admin-title', '系統實作內容')

@section('admin-content')
<div class="bg-white rounded-lg shadow p-6">
    <h2 class="text-2xl font-bold mb-6">系統核心實作 - 技術架構概覽</h2>
    
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <div class="border-l-4 border-matsu-pink p-4">
            <h3 class="font-bold text-lg mb-2">後端框架</h3>
            <ul class="space-y-1 text-gray-700">
                <li>✓ Laravel 11 - PHP Web 框架</li>
                <li>✓ MySQL/MariaDB - 數據庫</li>
                <li>✓ RESTful API - 前後端交互</li>
                <li>✓ OAuth 2.0 - 社交登入</li>
            </ul>
        </div>

        <div class="border-l-4 border-incense-gold p-4">
            <h3 class="font-bold text-lg mb-2">前端技術</h3>
            <ul class="space-y-1 text-gray-700">
                <li>✓ Blade Template - 伺服端渲染</li>
                <li>✓ Tailwind CSS - UI 框架</li>
                <li>✓ JavaScript - 互動邏輯</li>
                <li>✓ AJAX - 非同步請求</li>
            </ul>
        </div>

        <div class="border-l-4 border-supercar-pink p-4">
            <h3 class="font-bold text-lg mb-2">會員系統</h3>
            <ul class="space-y-1 text-gray-700">
                <li>✓ Email/手機會員註冊</li>
                <li>✓ Google OAuth 登入</li>
                <li>✓ LINE 登入整合</li>
                <li>✓ 密碼加密與驗証</li>
            </ul>
        </div>

        <div class="border-l-4 border-soft-pink-bg p-4">
            <h3 class="font-bold text-lg mb-2">訂房系統</h3>
            <ul class="space-y-1 text-gray-700">
                <li>✓ 房間管理</li>
                <li>✓ 預約流程</li>
                <li>✓ 日期衝突檢查</li>
                <li>✓ 訂單追蹤</li>
            </ul>
        </div>

        <div class="border-l-4 border-matsu-pink p-4">
            <h3 class="font-bold text-lg mb-2">金流系統</h3>
            <ul class="space-y-1 text-gray-700">
                <li>✓ LINE Pay 支付</li>
                <li>✓ 信用卡支付</li>
                <li>✓ 銀行匯款</li>
                <li>✓ 支付狀態追蹤</li>
            </ul>
        </div>

        <div class="border-l-4 border-incense-gold p-4">
            <h3 class="font-bold text-lg mb-2">管理功能</h3>
            <ul class="space-y-1 text-gray-700">
                <li>✓ 會員管理與權限</li>
                <li>✓ 房務維護排程</li>
                <li>✓ IOT 設備控制</li>
                <li>✓ 報表統計</li>
            </ul>
        </div>
    </div>

    <div class="mt-8 p-4 bg-blue-50 border border-blue-200 rounded">
        <h3 class="font-bold text-blue-800 mb-2">🔧 開發進度</h3>
        <div class="text-gray-700">
            <p><strong>已完成：</strong> 基礎框架、認證系統、數據模型</p>
            <p><strong>進行中：</strong> 訂房流程、支付整合</p>
            <p><strong>待開發：</strong> LINE/Google OAuth、IOT 整合、報表模塊</p>
        </div>
    </div>
</div>
@endsection
