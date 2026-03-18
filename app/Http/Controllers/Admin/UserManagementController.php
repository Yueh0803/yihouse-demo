<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UserManagementController extends Controller
{
    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            if (Auth::user()->role !== 'admin') {
                abort(403);
            }
            return $next($request);
        });
    }

    public function index()
    {
        $users = User::paginate(20);
        return view('admin.users.index', ['users' => $users]);
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('admin.users.edit', ['user' => $user]);
    }

    public function update($id)
    {
        $user = User::findOrFail($id);
        
        $validated = request()->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'role' => 'required|in:member,staff,admin',
            'is_active' => 'boolean',
        ]);

        $user->update($validated);
        return redirect()->route('admin.users.index')->with('success', '會員已更新');
    }

    public function deactivate($id)
    {
        $user = User::findOrFail($id);
        $user->update(['is_active' => false]);
        return redirect()->back()->with('success', '會員已停用');
    }
}
