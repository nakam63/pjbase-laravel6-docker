<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    /**
     * Redirect view after login.
     */
    public function redirectTo()
    {
        return route('admin.top');
    }

    /**
     * Define Login view.
     */
    public function showLoginForm()
    {
        return view('admin.login');
    }

    /**
     * Validate.(Set locale ja.)
     */
    protected function validateLogin(Request $request)
    {
        $messages = [
            $this->username() . '.required' => 'ログインIDを入力して下さい。',
            'password.required' => 'パスワードを入力して下さい。',
        ];

        $request->validate([
            $this->username() => 'required|string',
            'password' => 'required|string',
        ], $messages);
    }

    /**
     * En username.
     */
    public function username()
    {
        return 'username';
    }

    /**
     * Logout.
     */
    public function logout(Request $request)
    {
        $partialLogin = auth('user')->guest() || auth('admin')->guest();
        $this->guard()->logout();

        // Invalidate only when logged in by only one of admin or user.
        if ($partialLogin) {
            $request->session()->invalidate();
        }

        return redirect(route('admin.login'));
    }

    /**
     * Return using auth.
     */
    protected function guard()
    {
        return auth('admin');
    }

}
