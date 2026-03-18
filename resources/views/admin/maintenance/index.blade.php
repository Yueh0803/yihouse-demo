@extends('admin.layout')

@section('admin-title', '房務自動維護')

@section('admin-content')
<div class="bg-white rounded-lg shadow p-6">
    <h2 class="text-2xl font-bold mb-6">維護排程管理</h2>

    <div class="mb-6">
        <button class="bg-matsu-pink text-white px-4 py-2 rounded-md">+ 新增維護任務</button>
    </div>

    <div class="space-y-4">
        <div class="border rounded-lg p-4 hover:shadow-md transition">
            <div class="grid grid-cols-1 md:grid-cols-5 gap-4 items-center">
                <div>
                    <p class="text-gray-600 text-sm">房間</p>
                    <p class="font-bold">採蓮曲 (101)</p>
                </div>
                <div>
                    <p class="text-gray-600 text-sm">維護類型</p>
                    <p class="font-bold">日常清潔</p>
                </div>
                <div>
                    <p class="text-gray-600 text-sm">排程日期</p>
                    <p class="font-bold">2026-03-18</p>
                </div>
                <div>
                    <p class="text-gray-600 text-sm">狀態</p>
                    <span class="px-2 py-1 bg-blue-100 text-blue-700 rounded text-sm">排程中</span>
                </div>
                <div class="text-right">
                    <button class="text-blue-600 hover:underline">編輯</button>
                </div>
            </div>
        </div>

        <div class="border rounded-lg p-4 hover:shadow-md transition">
            <div class="grid grid-cols-1 md:grid-cols-5 gap-4 items-center">
                <div>
                    <p class="text-gray-600 text-sm">房間</p>
                    <p class="font-bold">長恨歌 (201)</p>
                </div>
                <div>
                    <p class="text-gray-600 text-sm">維護類型</p>
                    <p class="font-bold">設備檢查</p>
                </div>
                <div>
                    <p class="text-gray-600 text-sm">排程日期</p>
                    <p class="font-bold">2026-03-19</p>
                </div>
                <div>
                    <p class="text-gray-600 text-sm">狀態</p>
                    <span class="px-2 py-1 bg-green-100 text-green-700 rounded text-sm">已完成</span>
                </div>
                <div class="text-right">
                    <button class="text-gray-400">完成</button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
