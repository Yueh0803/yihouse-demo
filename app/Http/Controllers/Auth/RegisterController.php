<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\SocialAccount;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisterController extends Controller
{
    public function show(): View
    {
        return view('auth.register');
    }

    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:users'],
            'phone' => ['nullable', 'string', 'max:20'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'register_method' => 'required|in:email,phone',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'password' => Hash::make($request->password),
            'role' => 'member',
            'member_number' => 'MEM' . date('YmdHis') . rand(1000, 9999),
            'is_active' => true,
        ]);

        event(new Registered($user));

        Auth::login($user);

        return redirect()->route('dashboard.member.index');
    }

    public function loginWithGoogle(Request $request)
    {
        // Google authentication logic
        try {
            $user = User::where('email', $request->email)->first();
            
            if (!$user) {
                $user = User::create([
                    'name' => $request->name,
                    'email' => $request->email,
                    'google_id' => $request->google_id,
                    'role' => 'member',
                    'member_number' => 'MEM' . date('YmdHis') . rand(1000, 9999),
                    'is_active' => true,
                ]);
            }

            SocialAccount::updateOrCreate(
                ['user_id' => $user->id, 'provider' => 'google'],
                ['provider_id' => $request->google_id]
            );

            Auth::login($user);
            return redirect()->route('dashboard.member.index');
        } catch (\Exception $e) {
            return redirect()->route('login')->with('error', 'Google 登入失敗');
        }
    }

    public function loginWithLine(Request $request)
    {
        // LINE authentication logic
        try {
            $user = User::where('line_id', $request->line_id)->first();
            
            if (!$user) {
                $user = User::create([
                    'name' => $request->display_name,
                    'line_id' => $request->line_id,
                    'role' => 'member',
                    'member_number' => 'MEM' . date('YmdHis') . rand(1000, 9999),
                    'is_active' => true,
                ]);
            }

            SocialAccount::updateOrCreate(
                ['user_id' => $user->id, 'provider' => 'line'],
                ['provider_id' => $request->line_id]
            );

            Auth::login($user);
            return redirect()->route('dashboard.member.index');
        } catch (\Exception $e) {
            return redirect()->route('login')->with('error', 'LINE 登入失敗');
        }
    }
}
