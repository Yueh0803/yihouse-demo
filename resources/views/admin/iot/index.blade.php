@extends('admin.layout')

@section('admin-title', '智慧 IOT 系統')

@section('admin-content')
<div class="grid grid-cols-1 md:grid-cols-2 gap-6">
    <!-- 設備列表 -->
    <div class="bg-white rounded-lg shadow p-6">
        <h2 class="text-2xl font-bold mb-4">智慧設備</h2>
        <div class="space-y-3">
            <div class="border rounded p-4 flex justify-between items-center">
                <div>
                    <h3 class="font-bold">客廳冷氣</h3>
                    <p class="text-sm text-gray-600">溫度: 24°C</p>
                </div>
                <div class="flex gap-2">
                    <button class="bg-red-500 text-white px-3 py-1 rounded text-sm">關</button>
                    <button class="bg-green-500 text-white px-3 py-1 rounded text-sm">開</button>
                </div>
            </div>
            <div class="border rounded p-4 flex justify-between items-center">
                <div>
                    <h3 class="font-bold">主臥燈光</h3>
                    <p class="text-sm text-gray-600">亮度: 70%</p>
                </div>
                <input type="range" min="0" max="100" value="70" class="flex-1 mx-2">
            </div>
            <div class="border rounded p-4 flex justify-between items-center">
                <div>
                    <h3 class="font-bold">門鎖</h3>
                    <p class="text-sm text-gray-600">狀態: 已上鎖</p>
                </div>
                <span class="px-3 py-1 bg-green-100 text-green-700 rounded text-sm">✓ 安全</span>
            </div>
        </div>
    </div>

    <!-- 系統狀態 -->
    <div class="bg-white rounded-lg shadow p-6">
        <h2 class="text-2xl font-bold mb-4">系統狀態</h2>
        <div class="space-y-4">
            <div class="flex items-center justify-between p-3 bg-green-50 rounded">
                <span>網絡連接</span>
                <span class="text-green-600 font-bold">● 正常</span>
            </div>
            <div class="flex items-center justify-between p-3 bg-green-50 rounded">
                <span>電源狀態</span>
                <span class="text-green-600 font-bold">● 正常</span>
            </div>
            <div class="flex items-center justify-between p-3 bg-yellow-50 rounded">
                <span>電量</span>
                <span class="text-yellow-600 font-bold">60%</span>
            </div>
            <div class="flex items-center justify-between p-3 bg-green-50 rounded">
                <span>最後更新</span>
                <span class="text-gray-600">剛剛</span>
            </div>
        </div>
    </div>
</div>
@endsection
