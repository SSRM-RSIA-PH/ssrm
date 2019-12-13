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
        return view('admin.nicu.create', ['rek_id' => $rek_id]);
    }

    public function store(Request $request)
    {
        \Validator::make($request->all(), [
            'ct' => 'mimetypes:application/pdf',
            'resume' => 'mimetypes:application/pdf',
            'pengkajian' => 'mimetypes:application/pdf',
            'gp' => 'mimetypes:application/pdf',
            'fl' => 'mimetypes:application/pdf',
            'lab' => 'mimetypes:application/pdf',
            'xray' => 'mimetypes:application/pdf'
        ])->validate();

        $rek_id = $request->get('rek_id');

        $nicu = new Nicu;
        $nicu->rek_id = $rek_id;
        $nicu->u_id = $request->user()->id;
        $nicu->save();

        $nicu->nicu_datetime = $request->get('date');

        if ($request->file('ct')) {
            $dir = "Rekmed/$rek_id/NICU/$nicu->nicu_id/Catatan_Perkembangan_Terintegrasi/";
            $file = $nicu->nicu_id . "_nicu_cpt.pdf";

            $request->file('ct')->storeAs("public/$dir", $file);
            $nicu->nicu_ctt_integ = $dir . $file;
        }

        if ($request->file('resume')) {
            $dir = "Rekmed/$rek_id/NICU/$nicu->nicu_id/Resume/";
            $file = $nicu->nicu_id . "_nicu_r.pdf";

            $request->file('resume')->storeAs("public/$dir", $file);
            $nicu->nicu_resume = $dir . $file;
        }

        if ($request->file('pengkajian')) {
            $dir = "Rekmed/$rek_id/NICU/$nicu->nicu_id/Pengkajian_Awal/";
            $file = $nicu->nicu_id . "_nicu_pa.pdf";

            $request->file('pengkajian')->storeAs("public/$dir", $file);
            $nicu->nicu_pengkajian = $dir . $file;
        }

        if ($request->file('gp')) {
            $dir = "Rekmed/$rek_id/NICU/$nicu->nicu_id/Grafik/";
            $file = $nicu->nicu_id . "_nicu_g.pdf";

            $request->file('gp')->storeAs("public/$dir", $file);
            $nicu->nicu_grafik = $dir . $file;
        }

        if ($request->file('gp')) {
            $dir = "Rekmed/$rek_id/NICU/$nicu->nicu_id/Grafik/";
            $file = $nicu->nicu_id . "_nicu_g.pdf";

            $request->file('gp')->storeAs("public/$dir", $file);
            $nicu->nicu_grafik = $dir . $file;
        }

        if ($request->file('fl')) {
            $dir = "Rekmed/$rek_id/NICU/$nicu->nicu_id/File_Lengkap/";
            $file = $nicu->nicu_id . "_nicu_fl.pdf";

            $request->file('fl')->storeAs("public/$dir", $file);
            $nicu->nicu_file_lengkap = $dir . $file;
        }

        $nicu->save();
        $penunjang_names = ['xray', 'lab'];

        foreach ($penunjang_names as $p_name) {
            if ($request->file($p_name)) {
                $dir = "Rekmed/$rek_id/NICU/$nicu->nicu_id/Penunjang/";
                $file = $nicu->nicu_id . "_nicu_p-$p_name.pdf";

                $penunjang = new NicuPenunjang;

                $request->file($p_name)->storeAs("public/$dir", $file);

                $penunjang->p_name = $p_name;
                $penunjang->p_file = $dir . $file;
                $penunjang->nicu_id = $nicu->nicu_id;
                $penunjang->save();
            }
        }

        return redirect()->route('admin.create.nicu', ['rek_id' => $rek_id])->with('status', $nicu->nicu_id);
    }

    public function validation($id)
    {
        $data = Nicu::findOrFail($id);
        return view('admin.nicu.validation', ['nicu' => $data]);
    }

    public function cancel(Request $request)
    {
        $nicu_id = $request->get('nicu_id');
        $nicu = Nicu::findOrFail($nicu_id);
        $nicu->delete();
        return redirect()->route('admin.show.rek', ['rek_id' => $nicu->rek_id]);
    }
}
