<?php

namespace App\Http\Controllers\Member;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        return view('dashboard.member.profile', ['user' => $user]);
    }

    public function update($id)
    {
        $user = Auth::user();
        
        if ($user->id != $id) {
            return redirect()->back()->with('error', '無權限修改');
        }

        $validated = request()->validate([
            'name' => 'required|string|max:255',
            'phone' => 'nullable|string|max:20',
            'birth_date' => 'nullable|date',
            'address' => 'nullable|string|max:500',
        ]);

        $user->update($validated);

        return redirect()->back()->with('success', '個人資料已更新');
    }
}
