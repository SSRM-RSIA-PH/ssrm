<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Rekmed;

class DokterController extends Controller
{
    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            if (Gate::allows('dokter')) return $next($request);
            abort(403, 'Anda tidak memiliki cukup hak akses');
        });
    }

    public function index(Request $request)
    {
        $search = $request->get('search');
        if ($search) {
            $find = Rekmed::where('rek_id', 'LIKE', $search)->get();;
        } else {
            $find = NULL;
        }
        return view('dokter.index', ['find' => $find]);
    }

    public function igd_ctt()
    {

    }

    public function igd_res()
    {

    }
}
