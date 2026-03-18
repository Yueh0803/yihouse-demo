<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Payment;
use Illuminate\Support\Facades\Auth;

class OrderManagementController extends Controller
{
    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            if (Auth::user()->role !== 'admin' && Auth::user()->role !== 'staff') {
                abort(403);
            }
            return $next($request);
        });
    }

    public function index()
    {
        $orders = Order::with('user', 'room')->paginate(20);
        return view('admin.orders.index', ['orders' => $orders]);
    }

    public function detail($id)
    {
        $order = Order::with('user', 'room', 'payment')->findOrFail($id);
        return view('admin.orders.detail', ['order' => $order]);
    }

    public function updateStatus($id)
    {
        $order = Order::findOrFail($id);
        $order->update(['status' => request('status')]);
        return redirect()->back()->with('success', '訂單狀態已更新');
    }
}
