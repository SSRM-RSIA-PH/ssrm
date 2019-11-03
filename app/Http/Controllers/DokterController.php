<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Rekmed;


class DokterController extends Controller
{
    public function index(Request $request){
        $search = $request->get('search');
        
        if ($search) {
            $find = Rekmed::all()->where('rekid', 'LIKE', $search);
            return view('dokter.index', ['find' => $find]);
        } else {
            return view('dokter.index', ['find' => "Not Found"]);
        }
    }
}
