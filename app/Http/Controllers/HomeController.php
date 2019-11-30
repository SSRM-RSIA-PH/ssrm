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
                return redirect()->route('super.index');
                break;
            case 'ADMIN':
                return redirect()->route('admin.index');
                break;
            case 'DOKTER':
                return redirect()->route('dokter.index');
                break;
            default:
                abort(403, 'Anda tidak memiliki cukup hak akses');
                break;
        }
    }
}
