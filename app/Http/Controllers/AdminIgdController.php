<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use \App\Igd;
use \App\IgdPenunjang;

class AdminIgdController extends Controller
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
        return view('admin.igd.create', ['rek_id' => $rek_id]);
    }

    public function store(Request $request)
    {
        $rek_id = $request->get('rek_id');

        $igd = new Igd;
        $igd->rek_id = $rek_id;
        $igd->u_id = $request->user()->id;
        $igd->save();

        $igd->igd_datetime = $request->get('date');

        if ($request->file('cp')) {
            $dir = "Rekmed/$rek_id/IGD/$igd->igd_id/Catatan_Perkembangan/";
            $file = $igd->igd_id . "_igd_cp.pdf";

            $request->file('cp')->storeAs("public/$dir", $file);
            $igd->igd_ctt_perkembangan =  $dir . $file;
        }

        if ($request->file('resume')) {
            $dir = "Rekmed/$rek_id/IGD/$igd->igd_id/Resume/";
            $file = $igd->igd_id . "_igd_r.pdf";

            $request->file('resume')->storeAs("public/$dir", $file);
            $igd->igd_resume = $dir . $file;
        }

        $igd->save();

        $penunjang_names = ['usg', 'ctg', 'xray', 'ekg', 'lab'];

        foreach ($penunjang_names as $p_name) {
            if ($request->file($p_name)) {
                $dir = "Rekmed/$rek_id/IGD/$igd->igd_id/Penunjang/";
                $file = $igd->igd_id . "_igd_p-$p_name.pdf";

                $penunjang = new IgdPenunjang;

                $request->file($p_name)->storeAs("public/$dir", $file);

                $penunjang->p_name = $p_name;
                $penunjang->p_file = $dir . $file;
                $penunjang->igd_id = $igd->igd_id;
                $penunjang->save();
            }
        }

        return redirect()->route('admin.create.igd', ['rek_id' => $rek_id])->with('status', $igd->igd_id);
    }

    public function validation($id)
    {
        $data = Igd::findOrFail($id);
        return view('admin.igd.validation', ['igd' => $data]);
    }

    public function cancel(Request $request)
    {
        $igd_id = $request->get('igd_id');
        $igd = Igd::findOrFail($igd_id);
        $igd->delete();
        return redirect()->route('admin.show.rek', ['rek_id' => $igd->rek_id]);
    }
}