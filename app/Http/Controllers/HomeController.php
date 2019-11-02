<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        switch (Auth::user()->role) {
            case 'SUPERVISOR':
                return view('home.supervisor');
                break;
            case 'ADMIN':
                return view('home.admin');
                break;
            case 'DOKTER':
                return view('home.dokter');
                break;
            default:
                abort(403, 'Anda tidak memiliki cukup hak akses');
                break;
        }
    }
}
