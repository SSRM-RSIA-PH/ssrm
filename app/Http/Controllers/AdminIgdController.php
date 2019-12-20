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
        \Validator::make($request->all(), [
            // 'date' => 'date_format:Y-m-d H:i',
            'cp' => 'mimetypes:application/pdf',
            'resume' => 'mimetypes:application/pdf',
            'fl' => 'mimetypes:application/pdf',
            'usg' => 'mimetypes:application/pdf',
            'ctg' => 'mimetypes:application/pdf',
            'lab' => 'mimetypes:application/pdf',
            'xray' => 'mimetypes:application/pdf',
            'ekg' => 'mimetypes:application/pdf'
        ])->validate();

        $rek_id = $request->get('rek_id');

        $igd = new Igd;
        $igd->rek_id = $rek_id;
        $igd->u_id = $request->user()->id;
        $igd->save();

        $igd->igd_datetime = $request->get('date');
        $created_at = str_replace(' ', '_', $igd->created_at);

        if ($request->file('cp')) {
            $dir = "Rekmed/$rek_id/IGD/$created_at/Catatan_Perkembangan/";
            $file = $rek_id . '_' . $created_at . "_igd_cp.pdf";

            $request->file('cp')->storeAs("public/$dir", $file);
            $igd->igd_ctt_perkembangan =  $dir . $file;
        }

        if ($request->file('resume')) {
            $dir = "Rekmed/$rek_id/IGD/$created_at/Resume/";
            $file = $rek_id . '_' . $created_at . "_igd_r.pdf";

            $request->file('resume')->storeAs("public/$dir", $file);
            $igd->igd_resume = $dir . $file;
        }

        if ($request->file('fl')) {
            $dir = "Rekmed/$rek_id/IGD/$created_at/File_Lengkap/";
            $file = $rek_id . '_' . $created_at . "_igd_fl.pdf";

            $request->file('fl')->storeAs("public/$dir", $file);
            $igd->igd_file_lengkap = $dir . $file;
        }

        $igd->save();

        $penunjang_names = ['usg', 'ctg', 'xray', 'ekg', 'lab'];

        foreach ($penunjang_names as $p_name) {
            if ($request->file($p_name)) {
                $dir = "Rekmed/$rek_id/IGD/$created_at/Penunjang/";
                $file = $rek_id . '_' . $created_at . "_igd_p-$p_name.pdf";

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
