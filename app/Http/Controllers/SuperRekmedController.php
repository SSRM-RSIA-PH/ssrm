<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use \App\Rekmed;
use \App\Igd;
use \App\Nicu;
use \App\Poli;
use \App\RawatInap;

class SuperRekmedController extends Controller
{
    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            if (Gate::allows('supervisor')) return $next($request);
            abort(403, 'Anda tidak memiliki cukup hak akses');
        });
    }

    public function index()
    {
        $rekmed = Rekmed::orderBy('created_at', 'DESC')->paginate(10);
        return view('super.rekmed.index', ['rekmed' => $rekmed]);
    }

    public function show($rek_id)
    {
        $data = Rekmed::findOrFail($rek_id);
        return view('super.rekmed.show', [
            'rek_id'=>$rek_id,
            'rekmed'=>$data
        ]);
    }


    //show list
    public function show_igd($rek_id)
    {
        $igd = Igd::where('rek_id', $rek_id)->orderBy('igd_datetime', 'DESC')->paginate(10);
        return view('super.rekmed.show.igd', [
            'igd' => $igd,
            'rek_id' => $rek_id
        ]);
    }

    public function show_nicu($rek_id)
    {
        $nicu = Nicu::where('rek_id', $rek_id)->orderBy('nicu_datetime', 'DESC')->paginate(10);
        return view('super.rekmed.show.nicu', [
            'nicu' => $nicu,
            'rek_id' => $rek_id
        ]);
    }

    public function show_poli($rek_id)
    {
        $poli = Poli::where('rek_id', $rek_id)->orderBy('poli_datetime', 'DESC')->paginate(10);
        return view('super.rekmed.show.poli', [
            'poli' => $poli,
            'rek_id' => $rek_id
        ]);
    }

    public function show_ri($rek_id)
    {
        $ri = RawatInap::where('rek_id', $rek_id)->orderBy('ri_datetime', 'DESC')->paginate(10);
        return view('super.rekmed.show.ri', [
            'ri' => $ri,
            'rek_id' => $rek_id
        ]);
    }


    //detail file
    public function detail_igd($rek_id, $id)
    {
        $data = Igd::findOrFail($id);
        return view('super.rekmed.detail.igd', ['igd' => $data]);
    }

    public function detail_nicu($rek_id, $id)
    {
        $data = Nicu::findOrFail($id);
        return view('super.rekmed.detail.nicu', ['nicu' => $data]);
    }

    public function detail_poli($rek_id, $id)
    {
        $data = Poli::findOrFail($id);
        return view('super.rekmed.detail.poli', ['poli' => $data]);
    }

    public function detail_ri($rek_id, $id)
    {
        $data = RawatInap::findOrFail($id);
        return view('super.rekmed.detail.ri', ['ri' => $data]);
    }


    public function edit_rekmed($rek_id)
    {
        $data = Rekmed::findOrFail($rek_id);
        return view('super.rekmed.edit', ['rekmed' => $data]);
    }

    public function update_rekmed(Request $request, $rek_id)
    {
        $rekmed = Rekmed::findOrFail($rek_id);
        $rekmed->rek_id = $request->get('rek_id');
        $rekmed->rek_name = $request->get('rek_name');
        $rekmed->save();

        return redirect()->route('super.rekmed.edit', ['rek_id' => $rekmed->rek_id])->with('status', 'Berhasil');
    }
}
