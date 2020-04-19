<?php

namespace App\Http\Controllers\User;

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
        return route('user.top');
    }

    /**
     * Define Login view.
     */
    public function showLoginForm()
    {
        return view('user.login');
    }

    /**
     * Validate.(Set locale ja.)
     */
    protected function validateLogin(Request $request)
    {
        $messages = [
            $this->username() . '.required' => 'メールアドレスを入力して下さい。',
            'password.required' => 'パスワードを入力して下さい。',
        ];

        $request->validate([
            $this->username() => 'required|string',
            'password' => 'required|string',
        ], $messages);
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

        return redirect(route('user.login'));
    }

    /**
     * Return using auth.
     */
    protected function guard()
    {
        return auth('user');
    }

}
