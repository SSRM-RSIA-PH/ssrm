<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use \App\Poli;
use \App\PoliPenunjang;

class AdminPoliController extends Controller
{
    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            if (Gate::allows('admin')) return $next($request);
            abort(403, 'Anda tidak memiliki cukup hak akses');
        });
    }

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
        $poli->save();

        $poli->poli_datetime = $request->get('date');

        if ($request->file('ct')) {
            $file = $request->file('ct')->store("Rekmed/$rek_id/POLI/$poli->poli_id/Catatan_Terintegrasi", 'public');
            $poli->poli_ctt_integ = $file;
        }

        if ($request->file('resume')) {
            $file = $request->file('resume')->store("Rekmed/$rek_id/POLI/$poli->poli_id/Resume", 'public');
            $poli->poli_resume = $file;
        }

        $poli->save();
        $penunjang_names = ['usg', 'ctg', 'xray', 'ekg', 'lab'];

        foreach ($penunjang_names as $p_name) {
            if ($request->file($p_name)) {
                $penunjang = new PoliPenunjang;
                $file = $request->file($p_name)->store("Rekmed/$rek_id/POLI/$poli->poli_id/Penunjang/$p_name", 'public');
                $penunjang->p_name = $p_name;
                $penunjang->p_file = $file;
                $penunjang->poli_id = $poli->poli_id;
                $penunjang->save();
            }
        }

        return redirect()->route('admin.create.poli', ['rek_id' => $rek_id])->with('status', $poli->poli_id);
    }

    public function validation($id)
    {
        $data = Poli::findOrFail($id);
        return view('admin.poli.validation', ['poli'=>$data]);
    }

    public function cancel(Request $request)
    {
        $poli_id = $request->get('poli_id');
        $poli = Poli::findOrFail($poli_id);
        $poli->delete();
        return redirect()->route('admin.show.rek', ['rek_id'=>$poli->rek_id]);
    }
}
