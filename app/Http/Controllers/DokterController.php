<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Rekmed;


class DokterController extends Controller
{
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
