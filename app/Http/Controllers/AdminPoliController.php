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
        return view('admin.poli.create', ['rek_id' => $rek_id]);
    }

    public function store(Request $request)
    {
        \Validator::make($request->all(), [
            'date' => 'date_format:Y-m-d H:i',
            'ct' => 'mimetypes:application/pdf',
            'resume' => 'mimetypes:application/pdf',
            'fl' => 'mimetypes:application/pdf',
            'usg' => 'mimetypes:application/pdf',
            'ctg' => 'mimetypes:application/pdf',
            'lab' => 'mimetypes:application/pdf',
            'xray' => 'mimetypes:application/pdf',
            'ekg' => 'mimetypes:application/pdf'
        ])->validate();

        $rek_id = $request->get('rek_id');

        $poli = new Poli;
        $poli->rek_id = $rek_id;
        $poli->u_id = $request->user()->id;
        $poli->save();

        $poli->poli_datetime = $request->get('date');

        if ($request->file('ct')) {
            $dir = "Rekmed/$rek_id/POLI/$poli->poli_id/Catatan_Terintegrasi/";
            $file = $poli->poli_id . "_poli_ct.pdf";

            $request->file('ct')->storeAs("public/$dir", $file);
            $poli->poli_ctt_integ = $dir . $file;
        }

        if ($request->file('resume')) {
            $dir = "Rekmed/$rek_id/POLI/$poli->poli_id/Resume/";
            $file = $poli->poli_id . "_poli_r.pdf";

            $request->file('resume')->storeAs("public/$dir", $file);
            $poli->poli_resume = $dir . $file;
        }

        if ($request->file('fl')) {
            $dir = "Rekmed/$rek_id/POLI/$poli->poli_id/File_Lengkap/";
            $file = $poli->poli_id . "_poli_fl.pdf";

            $request->file('fl')->storeAs("public/$dir", $file);
            $poli->poli_file_lengkap = $dir . $file;
        }

        $poli->save();
        $penunjang_names = ['usg', 'ctg', 'xray', 'ekg', 'lab'];

        foreach ($penunjang_names as $p_name) {
            if ($request->file($p_name)) {
                $dir = "Rekmed/$rek_id/POLI/$poli->poli_id/Penunjang/";
                $file = $poli->poli_id . "_poli_p-$p_name.pdf";

                $penunjang = new PoliPenunjang;

                $request->file($p_name)->storeAs("public/$dir", $file);
                
                $penunjang->p_name = $p_name;
                $penunjang->p_file = $dir . $file;
                $penunjang->poli_id = $poli->poli_id;
                $penunjang->save();
            }
        }

        return redirect()->route('admin.create.poli', ['rek_id' => $rek_id])->with('status', $poli->poli_id);
    }

    public function validation($id)
    {
        $data = Poli::findOrFail($id);
        return view('admin.poli.validation', ['poli' => $data]);
    }

    public function cancel(Request $request)
    {
        $poli_id = $request->get('poli_id');
        $poli = Poli::findOrFail($poli_id);
        $poli->delete();
        return redirect()->route('admin.show.rek', ['rek_id' => $poli->rek_id]);
    }
}
