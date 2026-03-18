@extends('admin.layout')

@section('admin-title', '金流設定')

@section('admin-content')
<div class="grid grid-cols-1 md:grid-cols-2 gap-6">
    <!-- LINE Pay 設定 -->
    <div class="bg-white rounded-lg shadow p-6">
        <h2 class="text-xl font-bold mb-4">LINE Pay 設定</h2>
        <form action="{{ route('admin.payments.save-config') }}" method="POST">
            @csrf
            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700">Merchant ID</label>
                <input type="text" name="linepay_merchant_id" class="mt-1 p-2 w-full border border-gray-300 rounded-md">
            </div>
            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700">API Key</label>
                <input type="password" name="linepay_api_key" class="mt-1 p-2 w-full border border-gray-300 rounded-md">
            </div>
            <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded-md">保存</button>
        </form>
    </div>

    <!-- 信用卡設定 -->
    <div class="bg-white rounded-lg shadow p-6">
        <h2 class="text-xl font-bold mb-4">信用卡支付設定</h2>
        <form action="{{ route('admin.payments.save-config') }}" method="POST">
            @csrf
            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700">支付服務商</label>
                <select name="credit_card_provider" class="mt-1 p-2 w-full border border-gray-300 rounded-md">
                    <option value="">-- 選擇 --</option>
                    <option value="stripe">Stripe</option>
                    <option value="allpay">綠界</option>
                </select>
            </div>
            <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded-md">保存</button>
        </form>
    </div>

    <!-- 銀行匯款設定 -->
    <div class="bg-white rounded-lg shadow p-6 md:col-span-2">
        <h2 class="text-xl font-bold mb-4">銀行匯款設定</h2>
        <form action="{{ route('admin.payments.save-config') }}" method="POST">
            @csrf
            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700">銀行帳戶資訊</label>
                <textarea name="bank_account" rows="4" class="mt-1 p-2 w-full border border-gray-300 rounded-md" placeholder="銀行名稱\n帳戶號碼\n戶名">
                </textarea>
            </div>
            <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded-md">保存</button>
        </form>
    </div>
</div>
@endsection
