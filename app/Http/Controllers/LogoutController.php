<?php

namespace App\Http\Controllers;
use Auth;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class LogoutController extends Controller
{
    public function getLogout(Request $request) {
        Auth::logout();
        return redirect()->route('login');
    }
}
