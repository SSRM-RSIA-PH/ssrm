<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use \App\Rekmed;
use \App\Igd;
use App\IgdPenunjang;
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
            'rek_id' => $rek_id,
            'rekmed' => $data
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
        return view('super.rekmed.detail.igd', [
            'igd' => $data,
            'rek_id' => $rek_id
        ]);
    }

    public function detail_nicu($rek_id, $id)
    {
        $data = Nicu::findOrFail($id);
        return view('super.rekmed.detail.nicu', [
            'nicu' => $data,
            'rek_id' => $rek_id
        ]);
    }

    public function detail_poli($rek_id, $id)
    {
        $data = Poli::findOrFail($id);
        return view('super.rekmed.detail.poli', [
            'poli' => $data,
            'rek_id' => $rek_id
        ]);
    }

    public function detail_ri($rek_id, $id)
    {
        $data = RawatInap::findOrFail($id);
        return view('super.rekmed.detail.ri', [
            'ri' => $data,
            'rek_id' => $rek_id
        ]);
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

    public function destroy_rekmed($rek_id)
    {
        $rekmed = Rekmed::findOrFail($rek_id);
        $rekmed->delete();
        return redirect()->route('super.rekmed');
    }

    public function edit_detail_igd($rek_id, $id)
    {
        return view('super.rekmed.detail_edit.igd', [
            'rek_id' => $rek_id,
            'id' => $id,
            'penunjang'=> IgdPenunjang::where('igd_id', $id)->get()
        ]);
    }

    public function update_detail_igd(Request $request, $rek_id, $id)
    {
        $igd = Igd::findOrFail($id);

        if ($request->get('u_id')) {
            $igd->u_id = $request->get('u_id');
        }

        if ($request->get('date')) {
            $igd->igd_datetime = $request->get('date');
        }


        if ($request->file('cp')) {
            $dbfile = $igd->igd_ctt_perkembangan;
            if ($dbfile && file_exists(storage_path('app/public/' . $dbfile))) {
                \Storage::delete('public/' . $dbfile);
            }

            $file = $request->file('cp')->store("Rekmed/$rek_id/IGD/Catatan_Perkembangan", 'public');
            $igd->igd_ctt_perkembangan = $file;
        }

        if ($request->file('resume')) {
            $dbfile = $igd->igd_resume;
            if ($dbfile && file_exists(storage_path('app/public/' . $dbfile))) {
                \Storage::delete('public/' . $dbfile);
            }

            $file = $request->file('resume')->store("Rekmed/$rek_id/IGD/Resume", 'public');
            $igd->igd_resume = $file;
        }
        $igd->save();

        $penunjang = IgdPenunjang::where('igd_id', $id)->get();
        $ctgs = ['USG', 'CTG', 'XRAY', 'EKG', 'LAB'];

        foreach ($ctgs as $ctg) {
            $c = 0;
            if ($request->file($ctg)) {

                foreach ($penunjang as $p) {
                    if ($ctg == $p->p_name) {
                        $dbfile = $p->p_file;

                        if ($dbfile && file_exists(storage_path('app/public/' . $dbfile))) {
                            \Storage::delete('public/' . $dbfile);
                        }

                        $file = $request->file($ctg)->store("Rekmed/$rek_id/IGD/Penunjang/$ctg", 'public');
                        $p->p_file = $file;
                        $p->save();

                        $c += 1;
                    }
                }

                if ($c < 1) {
                    $file = $request->file($ctg)->store("Rekmed/$rek_id/IGD/Penunjang/$ctg", 'public');

                    $new_penunjang = new IgdPenunjang;
                    $new_penunjang->p_name = $ctg;
                    $new_penunjang->p_file = $file;
                    $new_penunjang->igd_id = $id;
                    $new_penunjang->save();
                }
            }
        }

        return redirect()->route('super.rekmed.igd.edit', [
            'rek_id' => $rek_id,
            'id' => $id
        ])->with('status', 'Berhasil Diubah');
    }
}
