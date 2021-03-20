<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    public function index()
    {
        if (Session::get('userLogin')) {
            return redirect()->route('dashboard.user');
        }
        return view('pages.login')->with('title', 'Login');
    }

    public function setSession(Request $request)
    {
        Session::put('userToken', $request->token);
        Session::put('userEmail', $request->email);
        Session::put('userName', $request->name);
        Session::put('userLogin', TRUE);
        return response()->json(['success' => 'set session is successful']);
    }

    public function deleteSession()
    {
        Session::flush();
        return response()->json(['success' => 'delete session is successful']);
    }
}
