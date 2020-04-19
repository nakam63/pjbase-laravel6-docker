<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * User table.
     */
    public function index(Request $request)
    {
        $users = User::latest()->withCount('messages')->get();
        return view('admin.user.index', compact('users'));
    }

    /**
     * Delete user.
     */
    public function destroy(User $user)
    {
        $user->delete();
        return ['success' => true];
    }
}
