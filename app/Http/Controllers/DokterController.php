<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use \App\Rekmed;
use \App\Igd;
use \App\Poli;
use \App\Nicu;
use \App\RawatInap;

class DokterController extends Controller
{
    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            if (Gate::allows('dokter')) return $next($request);
            abort(403, 'Anda tidak memiliki cukup hak akses');
        });
    }

    public function index(Request $request)
    {
        $search = $request->get('search');
        $find = NULL;
        if ($search) {
            $find = Rekmed::where('rek_id', 'LIKE', $search)->get();
        }

        return view('dokter.index', ['find' => $find]);
    }

    public function show($rek_id)
    {
        $data = Rekmed::findOrFail($rek_id);
        return view('dokter.show', [
            'rekmed' => $data
        ]);
    }


    //show list
    public function show_igd($rek_id)
    {
        $modal = Rekmed::find($rek_id);
        $igd = Igd::where('rek_id', $rek_id)->orderBy('igd_datetime', 'DESC')->paginate(10);
        return view('dokter.show.igd', [
            'rekmed' => $modal,
            'rek_id' => $rek_id,
            'igd' => $igd
        ]);
    }

    public function show_nicu($rek_id)
    {
        $modal = Rekmed::find($rek_id);       
        $nicu = Nicu::where('rek_id', $rek_id)->orderBy('nicu_datetime', 'DESC')->paginate(10);
        return view('dokter.show.nicu', [
            'rekmed' => $modal,
            'rek_id' => $rek_id,
            'nicu' => $nicu
        ]);
    }

    public function show_poli($rek_id)
    {
        $modal = Rekmed::find($rek_id);           
        $poli = Poli::where('rek_id', $rek_id)->orderBy('poli_datetime', 'DESC')->paginate(10);
        return view('dokter.show.poli', [
            'rekmed' => $modal,
            'rek_id' => $rek_id,
            'poli' => $poli,
        ]);
    }

    public function show_ri($rek_id)
    {
        $modal = Rekmed::find($rek_id);
        $ri = RawatInap::where('rek_id', $rek_id)->orderBy('ri_datetime', 'DESC')->paginate(10);
        return view('dokter.show.ri', [
            'rekmed' => $modal,
            'rek_id' => $rek_id,
            'ri' => $ri,
        ]);
    }


    //detail file
    public function detail_igd($rek_id, $id, $ctg)
    {
        $data = Igd::findOrFail($id);
        return view('dokter.detail.igd', [
            'rek_id' => $rek_id,
            'ctg' => $ctg,
            'igd' => $data
        ]);
    }

    public function detail_nicu($rek_id, $id, $ctg)
    {
        $data = Nicu::findOrFail($id);
        return view('dokter.detail.nicu', [
            'rek_id' => $rek_id,
            'ctg' => $ctg,
            'nicu' => $data
        ]);
    }

    public function detail_poli($rek_id, $id, $ctg)
    {
        $data = Poli::findOrFail($id);
        return view('dokter.detail.poli', [
            'rek_id' => $rek_id,
            'ctg' => $ctg,
            'poli' => $data
        ]);
    }

    public function detail_ri($rek_id, $id, $ctg)
    {
        $data = RawatInap::findOrFail($id);
        return view('dokter.detail.ri', [
            'rek_id' => $rek_id,
            'ctg' => $ctg,
            'ri' => $data
        ]);
    }
}
