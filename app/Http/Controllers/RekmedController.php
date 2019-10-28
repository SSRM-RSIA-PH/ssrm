<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RekmedController extends Controller
{
    public function index_dokter()
    {
        return view('rekmed.dokter.show');
    }
}
