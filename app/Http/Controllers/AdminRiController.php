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
        return view('admin.ri.create', ['rek_id' => $rek_id]);
    }

    public function store(Request $request)
    {
        $rek_id = $request->get('rek_id');

        $ri = new RawatInap;
        $ri->rek_id = $rek_id;
        $ri->u_id = $request->get('u_id');
        $ri->save();

        $ri->ri_datetime = $request->get('date');

        if ($request->file('ct')) {
            $dir = "Rekmed/$rek_id/Rawat_Inap/$ri->ri_id/Catatan_Perkembangan_Terintegrasi/";
            $file = $ri->ri_id . "_ri_cpt.pdf";

            $request->file('ct')->storeAs("public/$dir", $file);
            $ri->ri_ctt_integ = $dir . $file;
        }

        if ($request->file('resume')) {
            $dir = "Rekmed/$rek_id/Rawat_Inap/$ri->ri_id/Resume_Inap/";
            $file = $ri->ri_id . "_ri_r.pdf";

            $request->file('resume')->storeAs("public/$dir", $file);
            $ri->ri_resume = $dir . $file;
        }

        if ($request->file('cto')) {
            $dir = "Rekmed/$rek_id/Rawat_Inap/$ri->ri_id/Catatan_Tindakan-Operasi/";
            $file = $ri->ri_id . "_ri_cto.pdf";

            $request->file('cto')->storeAs("public/$dir", $file);
            $ri->ri_ctt_oper = $dir . $file;
        }

        if ($request->file('bayi')) {
            $dir = "Rekmed/$rek_id/Rawat_Inap/$ri->ri_id/Bayi/";
            $file = $ri->ri_id . "_ri_b.pdf";

            $request->file('bayi')->storeAs("public/$dir", $file);
            $ri->ri_bayi = $dir . $file;
        }

        $ri->save();
        $penunjang_names = ['xray', 'lab'];

        foreach ($penunjang_names as $p_name) {
            if ($request->file($p_name)) {
                $dir = "Rekmed/$rek_id/Rawat_Inap/$ri->ri_id/Penunjang/";
                $file = $ri->ri_id . "_ri_p-$p_name.pdf";

                $penunjang = new RawatInapPenunjang;

                $request->file($p_name)->storeAs("public/$dir", $file);
                
                $penunjang->p_name = $p_name;
                $penunjang->p_file = $dir . $file;
                $penunjang->ri_id = $ri->ri_id;
                $penunjang->save();
            }
        }

        return redirect()->route('admin.create.ri', ['rek_id' => $rek_id])->with('status', $ri->ri_id);
    }

    public function validation($id)
    {
        $data = RawatInap::findOrFail($id);
        return view('admin.ri.validation', ['ri' => $data]);
    }

    public function cancel(Request $request)
    {
        $ri_id = $request->get('ri_id');
        $ri = RawatInap::findOrFail($ri_id);
        $ri->delete();
        return redirect()->route('admin.show.rek', ['rek_id' => $ri->rek_id]);
    }
}
