<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Payment;
use Illuminate\Support\Facades\Auth;

class PaymentManagementController extends Controller
{
    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            if (Auth::user()->role !== 'admin' && Auth::user()->role !== 'finance') {
                abort(403);
            }
            return $next($request);
        });
    }

    public function index()
    {
        $payments = Payment::with('order')->paginate(20);
        return view('admin.payments.index', ['payments' => $payments]);
    }

    public function configure()
    {
        return view('admin.payments.configure');
    }

    public function saveConfig()
    {
        $validated = request()->validate([
            'linepay_merchant_id' => 'nullable|string',
            'linepay_api_key' => 'nullable|string',
            'credit_card_provider' => 'nullable|string',
            'bank_account' => 'nullable|string',
        ]);

        // TODO: Save to settings or config
        return redirect()->back()->with('success', '金流設定已保存');
    }
}
