<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use \App\RawatInap;
use \App\RawatInapPenunjang;

class AdminRiController extends Controller
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
        return view('admin.ri.create', ['rek_id'=>$rek_id]);
    }

    public function store(Request $request)
    {
        $rek_id = $request->get('rek_id');

        $ri = new RawatInap;
        $ri->rek_id = $rek_id;
        $ri->u_id = $request->get('u_id');
        $ri->ri_datetime = $request->get('date');

        if ($request->file('ct')) {
            $file = $request->file('ct')->store("Rekmed/$rek_id/Rawar_Inap/Catatan_Perkembangan_Terintegrasi", 'public');
            $ri->ri_ctt_integ = $file;
        }

        if ($request->file('resume')) {
            $file = $request->file('resume')->store("Rekmed/$rek_id/Rawar_Inap/Resume_Inap", 'public');
            $ri->ri_resume = $file;
        }

        if ($request->file('cto')) {
            $file = $request->file('cto')->store("Rekmed/$rek_id/Rawar_Inap/Catatan_Tindakan-Operasi", 'public');
            $ri->ri_ctt_oper = $file;
        }
        
        if ($request->file('bayi')) {
            $file = $request->file('bayi')->store("Rekmed/$rek_id/Rawar_Inap/Bayi", 'public');
            $ri->ri_bayi = $file;
        }

        $ri->save();
        $penunjang_names = ['xray', 'lab'];

        foreach ($penunjang_names as $p_name) {
            if ($request->file($p_name)) {
                $penunjang = new RawatInapPenunjang;
                $file = $request->file($p_name)->store("Rekmed/$rek_id/Rawar_Inap/Penunjang/$p_name", 'public');
                $penunjang->p_name = strtoupper($p_name);
                $penunjang->p_file = $file;
                $penunjang->ri_id = $ri->ri_id;
                $penunjang->save();
            }
        }

        return redirect()->route('admin.create.ri', ['rek_id' => $rek_id])->with('status', $ri->ri_id);
    }   

    public function validation($id)
    {
        $data = RawatInap::findOrFail($id);
        return view('admin.ri.validation', ['ri'=>$data]);
    }

    public function cancel(Request $request)
    {
        $ri_id = $request->get('ri_id');
        $ri = RawatInap::findOrFail($ri_id);
        $ri->delete();
        return redirect()->route('admin.show.rek', ['rek_id'=>$ri->rek_id]);
    }
}
