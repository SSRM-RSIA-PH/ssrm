<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Rekmed;
use \App\Igd;
use \App\Nicu;
use \App\Poli;
use \App\RawatInap;

class SuperRekmedController extends Controller
{
    public function index()
    {
        $rekmed = Rekmed::orderByDesc('created_at')->paginate(10);

        return view('super.rekmed.index', ['rekmed' => $rekmed]);
    }

    public function show($id)   
    {
        $igd = Igd::where('rek_id', $id)->get();
        $nicu = Nicu::where('rek_id', $id)->get();
        $poli = Poli::where('rek_id', $id)->get();
        $ri = RawatInap::where('rek_id', $id)->get();

        return view('super.rekmed.show', [
            'igd' => $igd,
            'nicu' => $nicu,
            'poli' => $poli,
            'ri' => $ri
        ]);
    }

    public function showdetail($id, $ctg, $id_ctg)
    {
        switch ($ctg) {
            case 'IGD':
                $detail = Igd::where('igd_id', $id_ctg)->get()->first();
                return view('super.rekmed.show-igd', ['detail'=>$detail]);
                break;

            case 'NICU':
                break;

            case 'POLI':
                $detail = Poli::where('poli_id', $id_ctg)->get()->first();
                return view('super.rekmed.show-poli', ['detail'=>$detail]);
                break;

            case 'RI':
                break;

            default:
                break;
        }

    }
}