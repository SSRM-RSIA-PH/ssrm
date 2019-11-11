<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Poli;
use \App\PoliPenunjang;

class AdminPoliController extends Controller
{
    public function create($rek_id)
    {
        return view('admin.poli.create', ['rek_id'=>$rek_id]);
    }

    public function store(Request $request)
    {
        $rek_id = $request->get('rek_id');

        $poli = new Poli;
        $poli->rek_id = $rek_id;
        $poli->u_id = $request->get('u_id');
        $poli->poli_datetime = $request->get('date');

        if ($request->file('ct')) {
            $file = $request->file('ct')->store("Rekmed/$rek_id/Catatan_Terintegrasi", 'public');
            $poli->poli_ctt_integ = $file;
        }

        if ($request->file('resume')) {
            $file = $request->file('resume')->store("Rekmed/$rek_id/Resume", 'public');
            $poli->poli_resume = $file;
        }

        $poli->save();
        $penunjang_names = ['usg', 'ctg', 'xray', 'ekg', 'lab'];

        foreach ($penunjang_names as $p_name) {
            if ($request->file($p_name)) {
                $penunjang = new PoliPenunjang;
                $file = $request->file($p_name)->store("Rekmed/$rek_id/Penunjang/$p_name", 'public');
                $penunjang->p_name = strtoupper($p_name);
                $penunjang->p_file = $file;
                $penunjang->poli_id = $poli->poli_id;
                $penunjang->save();
            }
        }

        return redirect()->route('admin.validation.poli', ['rek_id'=>$poli->poli_id]);
    }

    public function validation($id)
    {
        $data = Poli::where('poli_id', $id)->get()->first();
        return view('admin.poli.validation', ['poli'=>$data]);
    }

    public function cancel(Request $request)
    {
        $poli_id = $request->get('poli_id');
        $poli = Poli::findOrFail($poli_id);
        $poli->delete();
        return redirect()->route('admin.index');
    }
}
