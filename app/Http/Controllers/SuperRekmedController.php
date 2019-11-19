<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use \App\Rekmed;
use \App\Igd;
use App\IgdPenunjang;
use \App\Nicu;
use App\NicuPenunjang;
use \App\Poli;
use App\PoliPenunjang;
use \App\RawatInap;
use App\RawatInapPenunjang;

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


    //edit update rekmed
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


    //edit update detail igd
    public function edit_detail_igd($rek_id, $id)
    {
        $igd = Igd::findOrFail($id);
        $penunjang = IgdPenunjang::where('igd_id', $id)->get();

        return view('super.rekmed.detail_edit.igd', [
            'rek_id' => $rek_id,
            'igd' => $igd,
            'penunjang' => $penunjang
        ]);
    }

    public function update_detail_igd(Request $request, $rek_id, $id)
    {
        //catatan & resume
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

        //penunjang
        if ($request->file('usg')) {
            if ($request->get('id_usg')) {
                $igd_p = IgdPenunjang::findOrFail($request->get('id_usg'));

                $dbfile = $igd_p->p_file;
                if ($dbfile && file_exists(storage_path('app/public/' . $dbfile))) {
                    \Storage::delete('public/' . $dbfile);
                }
            } else {
                $igd_p = new IgdPenunjang;
                $igd_p->p_name = "usg";
                $igd_p->igd_id = $id;
            }

            $file = $request->file('usg')->store("Rekmed/$rek_id/IGD/Penunjang/usg", 'public');
            $igd_p->p_file = $file;
            $igd_p->save();
        }

        if ($request->file('ctg')) {
            if ($request->get('id_ctg')) {
                $igd_p = IgdPenunjang::findOrFail($request->get('id_ctg'));

                $dbfile = $igd_p->p_file;
                if ($dbfile && file_exists(storage_path('app/public/' . $dbfile))) {
                    \Storage::delete('public/' . $dbfile);
                }
            } else {
                $igd_p = new IgdPenunjang;
                $igd_p->p_name = "ctg";
                $igd_p->igd_id = $id;
            }

            $file = $request->file('ctg')->store("Rekmed/$rek_id/IGD/Penunjang/ctg", 'public');
            $igd_p->p_file = $file;
            $igd_p->save();
        }

        if ($request->file('xray')) {
            if ($request->get('id_xray')) {
                $igd_p = IgdPenunjang::findOrFail($request->get('id_xray'));

                $dbfile = $igd_p->p_file;
                if ($dbfile && file_exists(storage_path('app/public/' . $dbfile))) {
                    \Storage::delete('public/' . $dbfile);
                }
            } else {
                $igd_p = new IgdPenunjang;
                $igd_p->p_name = "xray";
                $igd_p->igd_id = $id;
            }

            $file = $request->file('xray')->store("Rekmed/$rek_id/IGD/Penunjang/xray", 'public');
            $igd_p->p_file = $file;
            $igd_p->save();
        }

        if ($request->file('ekg')) {
            if ($request->get('id_ekg')) {
                $igd_p = IgdPenunjang::findOrFail($request->get('id_ekg'));

                $dbfile = $igd_p->p_file;
                if ($dbfile && file_exists(storage_path('app/public/' . $dbfile))) {
                    \Storage::delete('public/' . $dbfile);
                }
            } else {
                $igd_p = new IgdPenunjang;
                $igd_p->p_name = "ekg";
                $igd_p->igd_id = $id;
            }

            $file = $request->file('ekg')->store("Rekmed/$rek_id/IGD/Penunjang/ekg", 'public');
            $igd_p->p_file = $file;
            $igd_p->save();
        }

        if ($request->file('lab')) {
            if ($request->get('id_lab')) {
                $igd_p = IgdPenunjang::findOrFail($request->get('id_lab'));

                $dbfile = $igd_p->p_file;
                if ($dbfile && file_exists(storage_path('app/public/' . $dbfile))) {
                    \Storage::delete('public/' . $dbfile);
                }
            } else {
                $igd_p = new IgdPenunjang;
                $igd_p->p_name = "lab";
                $igd_p->igd_id = $id;
            }

            $file = $request->file('lab')->store("Rekmed/$rek_id/IGD/Penunjang/lab", 'public');
            $igd_p->p_file = $file;
            $igd_p->save();
        }

        return redirect()->route('super.rekmed.igd.edit', [
            'rek_id' => $rek_id,
            'id' => $id
        ])->with('status', 'Berhasil Diubah');
    }


    //destroy
    //rekmed
    public function destroy_rekmed($rek_id)
    {
        $rekmed = Rekmed::findOrFail($rek_id);
        $rekmed->delete();
        return redirect()->route('super.rekmed');
    }

    //detail
    public function destroy_detail(Request $request, $id, $ctg)
    {
        switch ($ctg) {
            case 'igd':
                $db = Igd::findOrFail($id);
                break;

            case 'nicu':
                $db = Nicu::findOrFail($id);
                break;

            case 'poli':
                $db = Poli::findOrFail($id);
                break;

            case 'ri':
                $db = RawatInap::findOrFail($id);
                break;

            default:
                break;
        }

        $field = $request->get('field');

        if (file_exists(storage_path('app/public/' . $db->$field))) {
            \Storage::delete('public/' . $db->$field);
        }
        $db->$field = NULL;
        $db->save();

        return redirect()->route('super.rekmed.igd.edit', [
            'rek_id' => $db->rek_id,
            'id' => $id
        ]);
    }

    //detail penunjang
    public function destroy_detail_penunjang(Request $request, $id, $ctg)
    {
        switch ($ctg) {
            case 'igd':
                $db = IgdPenunjang::findOrFail($id);
                break;

            case 'nicu':
                $db = NicuPenunjang::findOrFail($id);
                break;

            case 'poli':
                $db = PoliPenunjang::findOrFail($id);
                break;

            case 'ri':
                $db = RawatInapPenunjang::findOrFail($id);
                break;

            default:
                break;
        }

        if (file_exists(storage_path('app/public/' . $db->p_file))) {
            \Storage::delete('public/' . $db->p_file);
        }

        $db->delete();

        return redirect()->route('super.rekmed.igd.edit', [
            'rek_id' => $request->get('rek_id'),
            'id' => $request->get('id')
        ]);
    }
}
