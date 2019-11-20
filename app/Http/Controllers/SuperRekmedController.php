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

    public function index(Request $request)
    {
        $search = $request->get('search');

        if ($search) {
            $rekmed = Rekmed::where('rek_name', 'LIKE', "%$search%")->orderBy('created_at', 'DESC')->paginate(10);
        } else {
            $rekmed = Rekmed::orderBy('created_at', 'DESC')->paginate(10);
        }

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


    //edit update detail poli
    public function edit_detail_poli($rek_id, $id)
    {
        $poli = Poli::findOrFail($id);
        $penunjang = PoliPenunjang::where('poli_id', $id)->get();

        return view('super.rekmed.detail_edit.poli', [
            'rek_id' => $rek_id,
            'poli' => $poli,
            'penunjang' => $penunjang
        ]);
    }

    public function update_detail_poli(Request $request, $rek_id, $id)
    {
        //catatan & resume
        $poli = Poli::findOrFail($id);

        if ($request->get('u_id')) {
            $poli->u_id = $request->get('u_id');
        }

        if ($request->get('date')) {
            $poli->poli_datetime = $request->get('date');
        }

        if ($request->file('cp')) {
            $dbfile = $poli->poli_ctt_integ;
            if ($dbfile && file_exists(storage_path('app/public/' . $dbfile))) {
                \Storage::delete('public/' . $dbfile);
            }

            $file = $request->file('cp')->store("Rekmed/$rek_id/POLI/Catatan_Terintegrasi", 'public');
            $poli->poli_ctt_integ = $file;
        }

        if ($request->file('resume')) {
            $dbfile = $poli->poli_resume;
            if ($dbfile && file_exists(storage_path('app/public/' . $dbfile))) {
                \Storage::delete('public/' . $dbfile);
            }

            $file = $request->file('resume')->store("Rekmed/$rek_id/POLI/Resume", 'public');
            $poli->poli_resume = $file;
        }
        $poli->save();

        //penunjang
        if ($request->file('usg')) {
            if ($request->get('id_usg')) {
                $poli_p = PoliPenunjang::findOrFail($request->get('id_usg'));

                $dbfile = $poli_p->p_file;
                if ($dbfile && file_exists(storage_path('app/public/' . $dbfile))) {
                    \Storage::delete('public/' . $dbfile);
                }
            } else {
                $poli_p = new PoliPenunjang;
                $poli_p->p_name = "usg";
                $poli_p->poli_id = $id;
            }

            $file = $request->file('usg')->store("Rekmed/$rek_id/POLI/Penunjang/usg", 'public');
            $poli_p->p_file = $file;
            $poli_p->save();
        }

        if ($request->file('ctg')) {
            if ($request->get('id_ctg')) {
                $poli_p = PoliPenunjang::findOrFail($request->get('id_ctg'));

                $dbfile = $poli_p->p_file;
                if ($dbfile && file_exists(storage_path('app/public/' . $dbfile))) {
                    \Storage::delete('public/' . $dbfile);
                }
            } else {
                $poli_p = new PoliPenunjang;
                $poli_p->p_name = "ctg";
                $poli_p->poli_id = $id;
            }

            $file = $request->file('ctg')->store("Rekmed/$rek_id/POLI/Penunjang/ctg", 'public');
            $poli_p->p_file = $file;
            $poli_p->save();
        }

        if ($request->file('xray')) {
            if ($request->get('id_xray')) {
                $poli_p = PoliPenunjang::findOrFail($request->get('id_xray'));

                $dbfile = $poli_p->p_file;
                if ($dbfile && file_exists(storage_path('app/public/' . $dbfile))) {
                    \Storage::delete('public/' . $dbfile);
                }
            } else {
                $poli_p = new PoliPenunjang;
                $poli_p->p_name = "xray";
                $poli_p->poli_id = $id;
            }

            $file = $request->file('xray')->store("Rekmed/$rek_id/POLI/Penunjang/xray", 'public');
            $poli_p->p_file = $file;
            $poli_p->save();
        }

        if ($request->file('ekg')) {
            if ($request->get('id_ekg')) {
                $poli_p = PoliPenunjang::findOrFail($request->get('id_ekg'));

                $dbfile = $poli_p->p_file;
                if ($dbfile && file_exists(storage_path('app/public/' . $dbfile))) {
                    \Storage::delete('public/' . $dbfile);
                }
            } else {
                $poli_p = new PoliPenunjang;
                $poli_p->p_name = "ekg";
                $poli_p->poli_id = $id;
            }

            $file = $request->file('ekg')->store("Rekmed/$rek_id/POLI/Penunjang/ekg", 'public');
            $poli_p->p_file = $file;
            $poli_p->save();
        }

        if ($request->file('lab')) {
            if ($request->get('id_lab')) {
                $poli_p = PoliPenunjang::findOrFail($request->get('id_lab'));

                $dbfile = $poli_p->p_file;
                if ($dbfile && file_exists(storage_path('app/public/' . $dbfile))) {
                    \Storage::delete('public/' . $dbfile);
                }
            } else {
                $poli_p = new PoliPenunjang;
                $poli_p->p_name = "lab";
                $poli_p->poli_id = $id;
            }

            $file = $request->file('lab')->store("Rekmed/$rek_id/POLI/Penunjang/lab", 'public');
            $poli_p->p_file = $file;
            $poli_p->save();
        }

        return redirect()->route('super.rekmed.poli.edit', [
            'rek_id' => $rek_id,
            'id' => $id
        ])->with('status', 'Berhasil Diubah');
    }


    //edit update detail nicu
    public function edit_detail_nicu($rek_id, $id)
    {
        $nicu = Nicu::findOrFail($id);
        $penunjang = NicuPenunjang::where('nicu_id', $id)->get();

        return view('super.rekmed.detail_edit.nicu', [
            'rek_id' => $rek_id,
            'nicu' => $nicu,
            'penunjang' => $penunjang
        ]);
    }

    public function update_detail_nicu(Request $request, $rek_id, $id)
    {
        //catatan & resume
        $nicu = Nicu::findOrFail($id);

        if ($request->get('u_id')) {
            $nicu->u_id = $request->get('u_id');
        }

        if ($request->get('date')) {
            $nicu->nicu_datetime = $request->get('date');
        }

        if ($request->file('cp')) {
            $dbfile = $nicu->nicu_ctt_integ;
            if ($dbfile && file_exists(storage_path('app/public/' . $dbfile))) {
                \Storage::delete('public/' . $dbfile);
            }

            $file = $request->file('cp')->store("Rekmed/$rek_id/NICU/Catatan_Terintegrasi", 'public');
            $nicu->nicu_ctt_integ = $file;
        }

        if ($request->file('resume')) {
            $dbfile = $nicu->nicu_resume;
            if ($dbfile && file_exists(storage_path('app/public/' . $dbfile))) {
                \Storage::delete('public/' . $dbfile);
            }

            $file = $request->file('resume')->store("Rekmed/$rek_id/NICU/Resume", 'public');
            $nicu->nicu_resume = $file;
        }

        if ($request->file('pengkajian')) {
            $dbfile = $nicu->nicu_pengkajian;
            if ($dbfile && file_exists(storage_path('app/public/' . $dbfile))) {
                \Storage::delete('public/' . $dbfile);
            }

            $file = $request->file('pengkajian')->store("Rekmed/$rek_id/NICU/Pengkajian_Awal", 'public');
            $nicu->nicu_pengkajian = $file;
        }

        if ($request->file('grafik')) {
            $dbfile = $nicu->nicu_grafik;
            if ($dbfile && file_exists(storage_path('app/public/' . $dbfile))) {
                \Storage::delete('public/' . $dbfile);
            }

            $file = $request->file('grafik')->store("Rekmed/$rek_id/NICU/Grafik", 'public');
            $nicu->nicu_grafik = $file;
        }
        $nicu->save();

        //penunjang
        if ($request->file('xray')) {
            if ($request->get('id_xray')) {
                $nicu_p = NicuPenunjang::findOrFail($request->get('id_xray'));

                $dbfile = $nicu_p->p_file;
                if ($dbfile && file_exists(storage_path('app/public/' . $dbfile))) {
                    \Storage::delete('public/' . $dbfile);
                }
            } else {
                $nicu_p = new NicuPenunjang;
                $nicu_p->p_name = "xray";
                $nicu_p->nicu_id = $id;
            }

            $file = $request->file('xray')->store("Rekmed/$rek_id/NICU/Penunjang/xray", 'public');
            $nicu_p->p_file = $file;
            $nicu_p->save();
        }

        if ($request->file('lab')) {
            if ($request->get('id_lab')) {
                $nicu_p = NicuPenunjang::findOrFail($request->get('id_lab'));

                $dbfile = $nicu_p->p_file;
                if ($dbfile && file_exists(storage_path('app/public/' . $dbfile))) {
                    \Storage::delete('public/' . $dbfile);
                }
            } else {
                $nicu_p = new NicuPenunjang;
                $nicu_p->p_name = "lab";
                $nicu_p->nicu_id = $id;
            }

            $file = $request->file('lab')->store("Rekmed/$rek_id/NICU/Penunjang/lab", 'public');
            $nicu_p->p_file = $file;
            $nicu_p->save();
        }

        return redirect()->route('super.rekmed.nicu.edit', [
            'rek_id' => $rek_id,
            'id' => $id
        ])->with('status', 'Berhasil Diubah');
    }


    //edit update detail rawat inap
    public function edit_detail_ri($rek_id, $id)
    {
        $ri = RawatInap::findOrFail($id);
        $penunjang = RawatInapPenunjang::where('ri_id', $id)->get();

        return view('super.rekmed.detail_edit.ri', [
            'rek_id' => $rek_id,
            'ri' => $ri,
            'penunjang' => $penunjang
        ]);
    }

    public function update_detail_ri(Request $request, $rek_id, $id)
    {
        //catatan & resume
        $ri = RawatInap::findOrFail($id);

        if ($request->get('u_id')) {
            $ri->u_id = $request->get('u_id');
        }

        if ($request->get('date')) {
            $ri->ri_datetime = $request->get('date');
        }

        if ($request->file('cp')) {
            $dbfile = $ri->ri_ctt_integ;
            if ($dbfile && file_exists(storage_path('app/public/' . $dbfile))) {
                \Storage::delete('public/' . $dbfile);
            }

            $file = $request->file('cp')->store("Rekmed/$rek_id/Rawar_Inap/Catatan_Perkembangan_Terintegrasi", 'public');
            $ri->ri_ctt_integ = $file;
        }

        if ($request->file('resume')) {
            $dbfile = $ri->ri_resume;
            if ($dbfile && file_exists(storage_path('app/public/' . $dbfile))) {
                \Storage::delete('public/' . $dbfile);
            }

            $file = $request->file('resume')->store("Rekmed/$rek_id/Rawar_Inap/Resume_Inap", 'public');
            $ri->ri_resume = $file;
        }

        if ($request->file('cto')) {
            $dbfile = $ri->ri_ctt_oper;
            if ($dbfile && file_exists(storage_path('app/public/' . $dbfile))) {
                \Storage::delete('public/' . $dbfile);
            }

            $file = $request->file('cto')->store("Rekmed/$rek_id/Rawar_Inap/Catatan_Tindakan-Operasi", 'public');
            $ri->ri_ctt_oper = $file;
        }

        if ($request->file('bayi')) {
            $dbfile = $ri->ri_bayi;
            if ($dbfile && file_exists(storage_path('app/public/' . $dbfile))) {
                \Storage::delete('public/' . $dbfile);
            }

            $file = $request->file('bayi')->store("Rekmed/$rek_id/Rawar_Inap/Bayi", 'public');
            $ri->ri_bayi = $file;
        }
        $ri->save();

        //penunjang
        if ($request->file('xray')) {
            if ($request->get('id_xray')) {
                $ri_p = RawatInapPenunjang::findOrFail($request->get('id_xray'));

                $dbfile = $ri_p->p_file;
                if ($dbfile && file_exists(storage_path('app/public/' . $dbfile))) {
                    \Storage::delete('public/' . $dbfile);
                }
            } else {
                $ri_p = new RawatInapPenunjang;
                $ri_p->p_name = "xray";
                $ri_p->ri_id = $id;
            }

            $file = $request->file('xray')->store("Rekmed/$rek_id/Rawar_Inap/Penunjang/xray", 'public');
            $ri_p->p_file = $file;
            $ri_p->save();
        }

        if ($request->file('lab')) {
            if ($request->get('id_lab')) {
                $ri_p = RawatInapPenunjang::findOrFail($request->get('id_lab'));

                $dbfile = $ri_p->p_file;
                if ($dbfile && file_exists(storage_path('app/public/' . $dbfile))) {
                    \Storage::delete('public/' . $dbfile);
                }
            } else {
                $ri_p = new RawatInapPenunjang;
                $ri_p->p_name = "lab";
                $ri_p->ri_id = $id;
            }

            $file = $request->file('lab')->store("Rekmed/$rek_id/Rawar_Inap/Penunjang/lab", 'public');
            $ri_p->p_file = $file;
            $ri_p->save();
        }

        return redirect()->route('super.rekmed.ri.edit', [
            'rek_id' => $rek_id,
            'id' => $id
        ])->with('status', 'Berhasil Diubah');
    }


    //destroy
    //destroy rekmed
    public function destroy_rekmed($rek_id)
    {
        $rekmed = Rekmed::findOrFail($rek_id);
        $rekmed->delete();
        return redirect()->route('super.rekmed');
    }

    //destroy detail
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

        return redirect()->route("super.rekmed.$ctg.edit", [
            'rek_id' => $db->rek_id,
            'id' => $id
        ]);
    }

    //destroy detail penunjang
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

        return redirect()->route("super.rekmed.$ctg.edit", [
            'rek_id' => $request->get('rek_id'),
            'id' => $request->get('id')
        ]);
    }
}
