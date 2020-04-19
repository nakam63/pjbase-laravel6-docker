<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    /**
     * Show  user top view.
     */
    public function index(Request $request)
    {
        return view('user.index');
    }

}
