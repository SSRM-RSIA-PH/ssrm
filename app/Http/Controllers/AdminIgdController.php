<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Igd;
use \App\IgdPenunjang;

class AdminIgdController extends Controller
{
    public function create($rek_id)
    {
        return view('admin.igd.create', ['rek_id'=>$rek_id]);
    }

    public function store(Request $request)
    {
        $rek_id = $request->get('rek_id');

        $igd = new Igd;
        $igd->rek_id = $rek_id;
        $igd->u_id = $request->get('u_id');
        $igd->igd_datetime = $request->get('date');

        if ($request->file('cp')) {
            $file = $request->file('cp')->store("Rekmed/$rek_id/Catatan_Perkembangan", 'public');
            $igd->igd_ctt_perkembangan = $file;
        }

        if ($request->file('resume')) {
            $file = $request->file('resume')->store("Rekmed/$rek_id/Resume", 'public');
            $igd->igd_resume = $file;
        }

        $igd->save();
        $penunjang_names = ['usg', 'ctg', 'xray', 'ekg', 'lab'];

        foreach ($penunjang_names as $p_name) {
            if ($request->file($p_name)) {
                $penunjang = new IgdPenunjang;
                $file = $request->file($p_name)->store("Rekmed/$rek_id/Penunjang/$p_name", 'public');
                $penunjang->p_name = strtoupper($p_name);
                $penunjang->p_file = $file;
                $penunjang->igd_id = $igd->igd_id;
                $penunjang->save();
            }
        }
        
        return redirect()->route('admin.index');
    }
}
