<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use \App\Nicu;
use \App\NicuPenunjang;

class AdminNicuController extends Controller
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
        return view('admin.nicu.create', ['rek_id'=>$rek_id]);
    }

    public function store(Request $request)
    {
        $rek_id = $request->get('rek_id');

        $nicu = new Nicu;
        $nicu->rek_id = $rek_id;
        $nicu->u_id = $request->get('u_id');
        $nicu->nicu_datetime = $request->get('date');

        if ($request->file('ct')) {
            $file = $request->file('ct')->store("Rekmed/$rek_id/Nicu/Catatan_Perkembangan_Terintegrasi", 'public');
            $nicu->nicu_ctt_integ = $file;
        }

        if ($request->file('resume')) {
            $file = $request->file('resume')->store("Rekmed/$rek_id/Nicu/Resume", 'public');
            $nicu->nicu_resume = $file;
        }

        if ($request->file('pengkajian')) {
            $file = $request->file('pengkajian')->store("Rekmed/$rek_id/Nicu/Pengkajian_Awal", 'public');
            $nicu->nicu_pengkajian = $file;
        }
        
        if ($request->file('gp')) {
            $file = $request->file('gp')->store("Rekmed/$rek_id/Nicu/Grafik", 'public');
            $nicu->nicu_grafik = $file;
        }

        $nicu->save();
        $penunjang_names = ['xray', 'lab'];

        foreach ($penunjang_names as $p_name) {
            if ($request->file($p_name)) {
                $penunjang = new NicuPenunjang;
                $file = $request->file($p_name)->store("Rekmed/$rek_id/Nicu/Penunjang/$p_name", 'public');
                $penunjang->p_name = strtoupper($p_name);
                $penunjang->p_file = $file;
                $penunjang->nicu_id = $nicu->nicu_id;
                $penunjang->save();
            }
        }

        return redirect()->route('admin.create.nicu', ['rek_id' => $rek_id])->with('status', $nicu->nicu_id);
    }   

    public function validation($id)
    {
        $data = Nicu::where('nicu_id', $id)->get()->first();
        return view('admin.nicu.validation', ['nicu'=>$data]);
    }

    public function cancel(Request $request)
    {
        $nicu_id = $request->get('nicu_id');
        $nicu = Nicu::findOrFail($nicu_id);
        $nicu->delete();
        return redirect()->route('admin.show.rek', ['rek_id'=>$nicu->rek_id]);
    }
}
