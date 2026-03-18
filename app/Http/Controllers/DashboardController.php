<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        
        if ($user->role === 'admin' || $user->role === 'staff') {
            return redirect()->route('admin.dashboard');
        }
        
        return redirect()->route('dashboard.member.index');
    }
}
