<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\RegisterRequest;
use App\Http\Requests\LoginRequest;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function register(RegisterRequest $request, CreatesNewUsers $creator)
    {

        $user = $creator->create($request->validated());
        Auth::login($user);

        return redirect()->route('admin.index');
    }
    public function login(LoginRequest $request)
    {
        if (! Auth::attempt($request->only('email', 'password'))) {
            return back()
                ->withErrors(['login' => 'ログイン情報が登録されていません'])
                ->withInput($request->only('email'));
        }

        $request->session()->regenerate();

        return redirect()->route('admin.index');
    }
}
