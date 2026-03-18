@extends('admin.layout')

@section('admin-title', '會員管理')

@section('admin-content')
<div class="bg-white rounded-lg shadow p-6">
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-2xl font-bold">所有會員</h2>
        <form action="{{ route('admin.users.index') }}" method="GET" class="flex gap-2">
            <input type="text" name="search" placeholder="搜尋會員..." class="px-3 py-2 border rounded-md">
            <button type="submit" class="bg-matsu-pink text-white px-4 py-2 rounded-md">搜尋</button>
        </form>
    </div>

    @if ($users->count() > 0)
        <div class="overflow-x-auto">
            <table class="w-full">
                <thead class="bg-gray-50 border-b">
                    <tr>
                        <th class="px-4 py-2 text-left">會員編號</th>
                        <th class="px-4 py-2 text-left">姓名</th>
                        <th class="px-4 py-2 text-left">Email</th>
                        <th class="px-4 py-2 text-left">角色</th>
                        <th class="px-4 py-2 text-left">狀態</th>
                        <th class="px-4 py-2 text-left">操作</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr class="border-b hover:bg-gray-50">
                            <td class="px-4 py-2">{{ $user->member_number ?? 'N/A' }}</td>
                            <td class="px-4 py-2">{{ $user->name }}</td>
                            <td class="px-4 py-2">{{ $user->email }}</td>
                            <td class="px-4 py-2">{{ $user->role }}</td>
                            <td class="px-4 py-2">
                                <span class="px-2 py-1 rounded text-sm {{ $user->is_active ? 'bg-green-100 text-green-700' : 'bg-red-100 text-red-700' }}">
                                    {{ $user->is_active ? '啟用' : '停用' }}
                                </span>
                            </td>
                            <td class="px-4 py-2">
                                <a href="{{ route('admin.users.edit', $user->id) }}" class="text-blue-600 hover:underline">編輯</a>
                                @if ($user->is_active)
                                    <form action="{{ route('admin.users.deactivate', $user->id) }}" method="POST" class="inline">
                                        @csrf
                                        @method('PUT')
                                        <button type="submit" class="text-red-600 hover:underline ml-2" onclick="return confirm('確認停用?')">停用</button>
                                    </form>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="mt-4">
            {{ $users->links() }}
        </div>
    @else
        <p class="text-gray-600">尚無會員記錄</p>
    @endif
</div>
@endsection
