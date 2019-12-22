<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use \App\Rekmed;
use \App\Igd;
use \App\IgdPenunjang;
use \App\Log;
use \App\Nicu;
use \App\NicuPenunjang;
use \App\Poli;
use \App\PoliPenunjang;
use \App\RawatInap;
use \App\RawatInapPenunjang;
use \App\RekmedAnak;
use \App\Arsip;

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

    public function show_arsip($rek_id)
    {
        $arsip = Arsip::where('rek_id', $rek_id)->orderBy('arsip_datetime', 'DESC')->paginate(10);
        return view('super.rekmed.show.arsip', [
            'arsip' => $arsip,
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

        if ($request->get('rek_nik') != $rekmed->rek_nik) {
            \Validator::make($request->all(), [
                'rek_nik' => 'unique:rekmed'
            ])->validate();
        }

        $rekmed->u_id = $request->user()->id;
        $rekmed->rek_name = $request->get('rek_name');

        $rekmed->rek_nik = $request->get('rek_nik');
        $rekmed->rek_tempat_lahir = $request->get('rek_tempat_lahir');
        $rekmed->rek_tanggal_lahir = $request->get('rek_tanggal_lahir');
        $rekmed->rek_darah = $request->get('rek_darah');
        $rekmed->rek_agama = $request->get('rek_agama');
        $rekmed->rek_job = $request->get('rek_job');
        $rekmed->rek_hp = $request->get('rek_hp');
        $rekmed->rek_alamat = $request->get('rek_alamat');

        $rekmed->s_name = $request->get('rs_name');
        $rekmed->s_job = $request->get('rs_job');
        $rekmed->s_darah = $request->get('rs_darah');
        $rekmed->s_hp = $request->get('rs_hp');
        $rekmed->s_alamat = $request->get('rs_alamat');

        $rekmed->p_ibu = $request->get('rp_ibu');
        $rekmed->p_ibu_hp = $request->get('rp_ibu_hp');
        $rekmed->p_bpk = $request->get('rp_ayah');
        $rekmed->p_bpk_hp = $request->get('rp_ayah_hp');

        $rekmed->save();

        if ($rekmed->rek_status == 'ibu') {
            return redirect()->route('super.rekmed.edit-anak', ['rek_id' => $rek_id]);
        } else {
            return redirect()->route('super.rekmed.edit', ['rek_id' => $rek_id])->with('status', "Berhasil Mengedit Rekam Medis $rek_id");
        }
    }

    public function edit_rekmed_anak($rek_id)
    {
        $rekmed = Rekmed::findOrFail($rek_id);
        $data_anak = RekmedAnak::where('rek_id', $rek_id)->get();

        $anak1 = $data_anak->where('ra_anak_ke', 1)->first();
        $anak2 = $data_anak->where('ra_anak_ke', 2)->first();
        $anak3 = $data_anak->where('ra_anak_ke', 3)->first();
        $anak4 = $data_anak->where('ra_anak_ke', 4)->first();
        $anak5 = $data_anak->where('ra_anak_ke', 5)->first();

        return view('super.rekmed.edit-anak', [
            'rek_id' => $rek_id,
            'anak1' => $anak1,
            'anak2' => $anak2,
            'anak3' => $anak3,
            'anak4' => $anak4,
            'anak5' => $anak5
        ]);
    }

    public function update_rekmed_anak(Request $request, $rek_id)
    {
        for ($i = 1; $i < 6; $i++) {

            if ($request->get("ra_name$i")) {

                if ($request->get("id$i")) {
                    $anak = RekmedAnak::find($request->get("id$i"));
                } else {
                    $anak = new RekmedAnak;
                }

                if ($request->get("ra_name$i")) {
                    $anak->ra_name = $request->get("ra_name$i");
                }
                if ($request->get("ra_tempat_lahir$i")) {
                    $anak->ra_tempat_lahir = $request->get("ra_tempat_lahir$i");
                }
                if ($request->get("ra_tanggal_lahir$i")) {
                    $anak->ra_tanggal_lahir = $request->get("ra_tanggal_lahir$i");
                }
                if ($request->get("ra_darah$i")) {
                    $anak->ra_darah = $request->get("ra_darah$i");
                }

                $anak->ra_anak_ke = $i;
                $anak->rek_id = $rek_id;
                $anak->save();
            }
        }

        return redirect()->route('super.rekmed.edit', ['rek_id' => $rek_id])->with('status', "Berhasil Mengedit Rekam Medis $rek_id");
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

        //catatan & resume
        $igd = Igd::findOrFail($id);

        $igd->u_id = $request->user()->id;
        $created_at = $igd->created_at;

        if ($request->get('date')) {
            $igd->igd_datetime = $request->get('date');
        }

        if ($request->file('cp')) {
            $dbfile = $igd->igd_ctt_perkembangan;
            if ($dbfile && file_exists(storage_path("app/public/$dbfile"))) {
                \Storage::delete("public/$dbfile");
            }

            $dir = "Rekmed/$rek_id/IGD/$created_at/Catatan_Perkembangan/";
            $file = $rek_id . '_' . $created_at . "_igd_cp.pdf";

            $request->file('cp')->storeAs("public/$dir", $file);
            $igd->igd_ctt_perkembangan =  $dir . $file;
        }

        if ($request->file('resume')) {
            $dbfile = $igd->igd_resume;
            if ($dbfile && file_exists(storage_path("app/public/$dbfile"))) {
                \Storage::delete("public/$dbfile");
            }

            $dir = "Rekmed/$rek_id/IGD/$created_at/Resume/";
            $file = $rek_id . '_' . $created_at . "_igd_r.pdf";

            $request->file('resume')->storeAs("public/$dir", $file);
            $igd->igd_resume = $dir . $file;
        }

        if ($request->file('fl')) {
            $dbfile = $igd->igd_file_lengkap;
            if ($dbfile && file_exists(storage_path("app/public/$dbfile"))) {
                \Storage::delete("public/$dbfile");
            }

            $dir = "Rekmed/$rek_id/IGD/$created_at/File_Lengkap/";
            $file = $rek_id . '_' . $created_at . "_igd_fl.pdf";

            $request->file('fl')->storeAs("public/$dir", $file);
            $igd->igd_file_lengkap = $dir . $file;
        }
        $igd->save();

        //penunjang
        $dir = "Rekmed/$rek_id/IGD/$created_at/Penunjang/";

        if ($request->file('usg')) {
            if ($request->get('id_usg')) {
                $igd_p = IgdPenunjang::findOrFail($request->get('id_usg'));

                $dbfile = $igd_p->p_file;
                if ($dbfile && file_exists(storage_path("app/public/$dbfile"))) {
                    \Storage::delete("public/$dbfile");
                }
            } else {
                $igd_p = new IgdPenunjang;
                $igd_p->p_name = "usg";
                $igd_p->igd_id = $id;
            }

            $file = $rek_id . '_' . $created_at . "_igd_p-usg.pdf";

            $request->file('usg')->storeAs("public/$dir", $file);
            $igd_p->p_file = $dir . $file;
            $igd_p->save();
        }

        if ($request->file('ctg')) {
            if ($request->get('id_ctg')) {
                $igd_p = IgdPenunjang::findOrFail($request->get('id_ctg'));

                $dbfile = $igd_p->p_file;
                if ($dbfile && file_exists(storage_path("app/public/$dbfile"))) {
                    \Storage::delete("public/$dbfile");
                }
            } else {
                $igd_p = new IgdPenunjang;
                $igd_p->p_name = "ctg";
                $igd_p->igd_id = $id;
            }

            $file = $rek_id . '_' . $created_at . "_igd_p-ctg.pdf";

            $request->file('ctg')->storeAs("public/$dir", $file);
            $igd_p->p_file = $dir . $file;
            $igd_p->save();
        }

        if ($request->file('xray')) {
            if ($request->get('id_xray')) {
                $igd_p = IgdPenunjang::findOrFail($request->get('id_xray'));

                $dbfile = $igd_p->p_file;
                if ($dbfile && file_exists(storage_path("app/public/$dbfile"))) {
                    \Storage::delete("public/$dbfile");
                }
            } else {
                $igd_p = new IgdPenunjang;
                $igd_p->p_name = "xray";
                $igd_p->igd_id = $id;
            }

            $file = $rek_id . '_' . $created_at . "_igd_p-xray.pdf";

            $request->file('xray')->storeAs("public/$dir", $file);
            $igd_p->p_file = $dir . $file;
            $igd_p->save();
        }

        if ($request->file('ekg')) {
            if ($request->get('id_ekg')) {
                $igd_p = IgdPenunjang::findOrFail($request->get('id_ekg'));

                $dbfile = $igd_p->p_file;
                if ($dbfile && file_exists(storage_path("app/public/$dbfile"))) {
                    \Storage::delete("public/$dbfile");
                }
            } else {
                $igd_p = new IgdPenunjang;
                $igd_p->p_name = "ekg";
                $igd_p->igd_id = $id;
            }

            $file = $rek_id . '_' . $created_at . "_igd_p-ekg.pdf";

            $request->file('ekg')->storeAs("public/$dir", $file);
            $igd_p->p_file = $dir . $file;
            $igd_p->save();
        }

        if ($request->file('lab')) {
            if ($request->get('id_lab')) {
                $igd_p = IgdPenunjang::findOrFail($request->get('id_lab'));

                $dbfile = $igd_p->p_file;
                if ($dbfile && file_exists(storage_path("app/public/$dbfile"))) {
                    \Storage::delete("public/$dbfile");
                }
            } else {
                $igd_p = new IgdPenunjang;
                $igd_p->p_name = "lab";
                $igd_p->igd_id = $id;
            }

            $file = $rek_id . '_' . $created_at . "_igd_p-lab.pdf";

            $request->file('lab')->storeAs("public/$dir", $file);
            $igd_p->p_file = $dir . $file;
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
        \Validator::make($request->all(), [
            // 'date' => 'date_format:Y-m-d H:i',
            'ct' => 'mimetypes:application/pdf',
            'resume' => 'mimetypes:application/pdf',
            'fl' => 'mimetypes:application/pdf',
            'usg' => 'mimetypes:application/pdf',
            'ctg' => 'mimetypes:application/pdf',
            'lab' => 'mimetypes:application/pdf',
            'xray' => 'mimetypes:application/pdf',
            'ekg' => 'mimetypes:application/pdf'
        ])->validate();

        //catatan & resume
        $poli = Poli::findOrFail($id);

        $poli->u_id = $request->user()->id;
        $created_at = str_replace(' ', '_', $poli->created_at);

        if ($request->get('date')) {
            $poli->poli_datetime = $request->get('date');
        }

        if ($request->file('cp')) {
            $dbfile = $poli->poli_ctt_integ;
            if ($dbfile && file_exists(storage_path("app/public/$dbfile"))) {
                \Storage::delete("public/$dbfile");
            }

            $dir = "Rekmed/$rek_id/POLI/$created_at/Catatan_Terintegrasi/";
            $file = $rek_id . '_' . $created_at . "_poli_ct.pdf";

            $request->file('cp')->storeAs("public/$dir", $file);
            $poli->poli_ctt_integ = $dir . $file;
        }

        if ($request->file('resume')) {
            $dbfile = $poli->poli_resume;
            if ($dbfile && file_exists(storage_path("app/public/$dbfile"))) {
                \Storage::delete("public/$dbfile");
            }

            $dir = "Rekmed/$rek_id/POLI/$created_at/Resume/";
            $file = $rek_id . '_' . $created_at . "_poli_r.pdf";

            $request->file('resume')->storeAs("public/$dir", $file);
            $poli->poli_resume = $dir . $file;
        }

        if ($request->file('fl')) {
            $dbfile = $poli->poli_file_lengkap;
            if ($dbfile && file_exists(storage_path("app/public/$dbfile"))) {
                \Storage::delete("public/$dbfile");
            }

            $dir = "Rekmed/$rek_id/POLI/$created_at/File_Lengkap/";
            $file = $rek_id . '_' . $created_at . "_poli_fl.pdf";

            $request->file('fl')->storeAs("public/$dir", $file);
            $poli->poli_file_lengkap = $dir . $file;
        }
        $poli->save();

        //penunjang
        $dir = "Rekmed/$rek_id/POLI/$created_at/Penunjang/";
        if ($request->file('usg')) {
            if ($request->get('id_usg')) {
                $poli_p = PoliPenunjang::findOrFail($request->get('id_usg'));

                $dbfile = $poli_p->p_file;
                if ($dbfile && file_exists(storage_path("app/public/$dbfile"))) {
                    \Storage::delete("public/$dbfile");
                }
            } else {
                $poli_p = new PoliPenunjang;
                $poli_p->p_name = "usg";
                $poli_p->poli_id = $id;
            }

            $file = $rek_id . '_' . $created_at . "_poli_p-usg.pdf";

            $request->file('usg')->storeAs("public/$dir", $file);
            $poli_p->p_file = $dir . $file;
            $poli_p->save();
        }

        if ($request->file('ctg')) {
            if ($request->get('id_ctg')) {
                $poli_p = PoliPenunjang::findOrFail($request->get('id_ctg'));

                $dbfile = $poli_p->p_file;
                if ($dbfile && file_exists(storage_path("app/public/$dbfile"))) {
                    \Storage::delete("public/$dbfile");
                }
            } else {
                $poli_p = new PoliPenunjang;
                $poli_p->p_name = "ctg";
                $poli_p->poli_id = $id;
            }

            $file = $rek_id . '_' . $created_at . "_poli_p-ctg.pdf";

            $request->file('ctg')->storeAs("public/$dir", $file);
            $poli_p->p_file = $dir . $file;
            $poli_p->save();
        }

        if ($request->file('xray')) {
            if ($request->get('id_xray')) {
                $poli_p = PoliPenunjang::findOrFail($request->get('id_xray'));

                $dbfile = $poli_p->p_file;
                if ($dbfile && file_exists(storage_path("app/public/$dbfile"))) {
                    \Storage::delete("public/$dbfile");
                }
            } else {
                $poli_p = new PoliPenunjang;
                $poli_p->p_name = "xray";
                $poli_p->poli_id = $id;
            }

            $file = $rek_id . '_' . $created_at . "_poli_p-xray.pdf";

            $request->file('xray')->storeAs("public/$dir", $file);
            $poli_p->p_file = $dir . $file;
            $poli_p->save();
        }

        if ($request->file('ekg')) {
            if ($request->get('id_ekg')) {
                $poli_p = PoliPenunjang::findOrFail($request->get('id_ekg'));

                $dbfile = $poli_p->p_file;
                if ($dbfile && file_exists(storage_path("app/public/$dbfile"))) {
                    \Storage::delete("public/$dbfile");
                }
            } else {
                $poli_p = new PoliPenunjang;
                $poli_p->p_name = "ekg";
                $poli_p->poli_id = $id;
            }

            $file = $rek_id . '_' . $created_at . "_poli_p-ekg.pdf";

            $request->file('ekg')->storeAs("public/$dir", $file);
            $poli_p->p_file = $dir . $file;
            $poli_p->save();
        }

        if ($request->file('lab')) {
            if ($request->get('id_lab')) {
                $poli_p = PoliPenunjang::findOrFail($request->get('id_lab'));

                $dbfile = $poli_p->p_file;
                if ($dbfile && file_exists(storage_path("app/public/$dbfile"))) {
                    \Storage::delete("public/$dbfile");
                }
            } else {
                $poli_p = new PoliPenunjang;
                $poli_p->p_name = "lab";
                $poli_p->poli_id = $id;
            }

            $file = $rek_id . '_' . $created_at . "_poli_p-lab.pdf";

            $request->file('lab')->storeAs("public/$dir", $file);
            $poli_p->p_file = $dir . $file;
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
        \Validator::make($request->all(), [
            // 'date' => 'date_format:Y-m-d H:i',
            'ct' => 'mimetypes:application/pdf',
            'resume' => 'mimetypes:application/pdf',
            'pengkajian' => 'mimetypes:application/pdf',
            'gp' => 'mimetypes:application/pdf',
            'fl' => 'mimetypes:application/pdf',
            'lab' => 'mimetypes:application/pdf',
            'xray' => 'mimetypes:application/pdf'
        ])->validate();

        //catatan & resume
        $nicu = Nicu::findOrFail($id);

        $nicu->u_id = $request->user()->id;
        $created_at = str_replace(' ', '_', $nicu->created_at);

        if ($request->get('date')) {
            $nicu->nicu_datetime = $request->get('date');
        }

        if ($request->file('cp')) {
            $dbfile = $nicu->nicu_ctt_integ;
            if ($dbfile && file_exists(storage_path("app/public/$dbfile"))) {
                \Storage::delete("public/$dbfile");
            }
            $dir = "Rekmed/$rek_id/NICU/$created_at/Catatan_Perkembangan_Terintegrasi/";
            $file = $rek_id . '_' . $created_at . "_nicu_cpt.pdf";

            $request->file('cp')->storeAs("public/$dir", $file);
            $nicu->nicu_ctt_integ = $dir . $file;
        }

        if ($request->file('resume')) {
            $dbfile = $nicu->nicu_resume;
            if ($dbfile && file_exists(storage_path("app/public/$dbfile"))) {
                \Storage::delete("public/$dbfile");
            }
            $dir = "Rekmed/$rek_id/NICU/$created_at/Resume/";
            $file = $rek_id . '_' . $created_at . "_nicu_r.pdf";

            $request->file('resume')->storeAs("public/$dir", $file);
            $nicu->nicu_resume = $dir . $file;
        }

        if ($request->file('pengkajian')) {
            $dbfile = $nicu->nicu_pengkajian;
            if ($dbfile && file_exists(storage_path("app/public/$dbfile"))) {
                \Storage::delete("public/$dbfile");
            }
            $dir = "Rekmed/$rek_id/NICU/$created_at/Pengkajian_Awal/";
            $file = $rek_id . '_' . $created_at . "_nicu_pa.pdf";

            $request->file('pengkajian')->storeAs("public/$dir", $file);
            $nicu->nicu_pengkajian = $dir . $file;
        }

        if ($request->file('grafik')) {
            $dbfile = $nicu->nicu_grafik;
            if ($dbfile && file_exists(storage_path("app/public/$dbfile"))) {
                \Storage::delete("public/$dbfile");
            }
            $dir = "Rekmed/$rek_id/NICU/$created_at/Grafik/";
            $file = $rek_id . '_' . $created_at . "_nicu_g.pdf";

            $request->file('grafik')->storeAs("public/$dir", $file);
            $nicu->nicu_grafik = $dir . $file;
        }

        if ($request->file('fl')) {
            $dbfile = $nicu->nicu_file_lengkap;
            if ($dbfile && file_exists(storage_path("app/public/$dbfile"))) {
                \Storage::delete("public/$dbfile");
            }
            $dir = "Rekmed/$rek_id/NICU/$created_at/File_Lengkap/";
            $file = $rek_id . '_' . $created_at . "_nicu_fl.pdf";

            $request->file('fl')->storeAs("public/$dir", $file);
            $nicu->nicu_file_lengkap = $dir . $file;
        }
        $nicu->save();

        //penunjang
        $dir = "Rekmed/$rek_id/NICU/$created_at/Penunjang/";

        if ($request->file('xray')) {
            if ($request->get('id_xray')) {
                $nicu_p = NicuPenunjang::findOrFail($request->get('id_xray'));

                $dbfile = $nicu_p->p_file;
                if ($dbfile && file_exists(storage_path("app/public/$dbfile"))) {
                    \Storage::delete("public/$dbfile");
                }
            } else {
                $nicu_p = new NicuPenunjang;
                $nicu_p->p_name = "xray";
                $nicu_p->nicu_id = $id;
            }

            $file = $rek_id . '_' . $created_at . "_nicu_p-xray.pdf";

            $request->file('xray')->storeAs("public/$dir", $file);
            $nicu_p->p_file = $dir . $file;
            $nicu_p->save();
        }

        if ($request->file('lab')) {
            if ($request->get('id_lab')) {
                $nicu_p = NicuPenunjang::findOrFail($request->get('id_lab'));

                $dbfile = $nicu_p->p_file;
                if ($dbfile && file_exists(storage_path("app/public/$dbfile"))) {
                    \Storage::delete("public/$dbfile");
                }
            } else {
                $nicu_p = new NicuPenunjang;
                $nicu_p->p_name = "lab";
                $nicu_p->nicu_id = $id;
            }

            $file = $rek_id . '_' . $created_at . "_nicu_p-lab.pdf";

            $request->file('lab')->storeAs("public/$dir", $file);
            $nicu_p->p_file = $dir . $file;
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
        \Validator::make($request->all(), [
            // 'date' => 'date_format:Y-m-d H:i',
            'ct' => 'mimetypes:application/pdf',
            'resume' => 'mimetypes:application/pdf',
            'cto' => 'mimetypes:application/pdf',
            'bayi' => 'mimetypes:application/pdf',
            'fl' => 'mimetypes:application/pdf',
            'lab' => 'mimetypes:application/pdf',
            'xray' => 'mimetypes:application/pdf'
        ])->validate();

        //catatan & resume
        $ri = RawatInap::findOrFail($id);

        $ri->u_id = $request->user()->id;
        $created_at = str_replace(' ', '_', $ri->created_at);

        if ($request->get('date')) {
            $ri->ri_datetime = $request->get('date');
        }

        if ($request->file('cp')) {
            $dbfile = $ri->ri_ctt_integ;
            if ($dbfile && file_exists(storage_path("app/public/$dbfile"))) {
                \Storage::delete("public/$dbfile");
            }
            $dir = "Rekmed/$rek_id/Rawat_Inap/$created_at/Catatan_Perkembangan_Terintegrasi/";
            $file = $rek_id . '_' . $created_at . "_ri_cpt.pdf";

            $request->file('cp')->storeAs("public/$dir", $file);
            $ri->ri_ctt_integ = $dir . $file;
        }

        if ($request->file('resume')) {
            $dbfile = $ri->ri_resume;
            $dir = "Rekmed/$rek_id/Rawat_Inap/$created_at/Resume_Inap/";
            $file = $rek_id . '_' . $created_at . "_ri_r.pdf";

            $request->file('resume')->storeAs("public/$dir", $file);
            $ri->ri_resume = $dir . $file;
        }

        if ($request->file('cto')) {
            $dbfile = $ri->ri_ctt_oper;
            if ($dbfile && file_exists(storage_path("app/public/$dbfile"))) {
                \Storage::delete("public/$dbfile");
            }
            $dir = "Rekmed/$rek_id/Rawat_Inap/$created_at/Catatan_Tindakan-Operasi/";
            $file = $rek_id . '_' . $created_at . "_ri_cto.pdf";

            $request->file('cto')->storeAs("public/$dir", $file);
            $ri->ri_ctt_oper = $dir . $file;
        }

        if ($request->file('bayi')) {
            $dbfile = $ri->ri_bayi;
            if ($dbfile && file_exists(storage_path("app/public/$dbfile"))) {
                \Storage::delete("public/$dbfile");
            }
            $dir = "Rekmed/$rek_id/Rawat_Inap/$created_at/Bayi/";
            $file = $rek_id . '_' . $created_at . "_ri_b.pdf";

            $request->file('bayi')->storeAs("public/$dir", $file);
            $ri->ri_bayi = $dir . $file;
        }

        if ($request->file('fl')) {
            $dbfile = $ri->ri_file_lengkap;
            if ($dbfile && file_exists(storage_path("app/public/$dbfile"))) {
                \Storage::delete("public/$dbfile");
            }
            $dir = "Rekmed/$rek_id/Rawat_Inap/$created_at/File_Lengkap/";
            $file = $rek_id . '_' . $created_at . "_ri_fl.pdf";

            $request->file('fl')->storeAs("public/$dir", $file);
            $ri->ri_file_lengkap = $dir . $file;
        }
        $ri->save();

        //penunjang
        $dir = "Rekmed/$rek_id/Rawat_Inap/$created_at/Penunjang/";

        if ($request->file('xray')) {
            if ($request->get('id_xray')) {
                $ri_p = RawatInapPenunjang::findOrFail($request->get('id_xray'));

                $dbfile = $ri_p->p_file;
                if ($dbfile && file_exists(storage_path("app/public/$dbfile"))) {
                    \Storage::delete("public/$dbfile");
                }
            } else {
                $ri_p = new RawatInapPenunjang;
                $ri_p->p_name = "xray";
                $ri_p->ri_id = $id;
            }

            $file = $rek_id . '_' . $created_at . "_ri_p-xray.pdf";

            $request->file('xray')->storeAs("public/$dir", $file);
            $ri_p->p_file = $dir . $file;
            $ri_p->save();
        }

        if ($request->file('lab')) {
            if ($request->get('id_lab')) {
                $ri_p = RawatInapPenunjang::findOrFail($request->get('id_lab'));

                $dbfile = $ri_p->p_file;
                if ($dbfile && file_exists(storage_path("app/public/$dbfile"))) {
                    \Storage::delete("public/$dbfile");
                }
            } else {
                $ri_p = new RawatInapPenunjang;
                $ri_p->p_name = "lab";
                $ri_p->ri_id = $id;
            }

            $file = $rek_id . '_' . $created_at . "_ri_p-lab.pdf";

            $request->file('lab')->storeAs("public/$dir", $file);
            $ri_p->p_file = $dir . $file;
            $ri_p->save();
        }

        return redirect()->route('super.rekmed.ri.edit', [
            'rek_id' => $rek_id,
            'id' => $id
        ])->with('status', 'Berhasil Diubah');
    }

    //edit update arsip tahunan
    public function edit_arsip_tahunan($rek_id, $id)
    {
        $arsip = Arsip::findOrFail($id);
        return view('super.rekmed.detail_edit.arsip', [
            'rek_id' => $rek_id,
            'arsip' => $arsip
        ]);
    }

    public function update_arsip_tahunan(Request $request)
    {
        \Validator::make($request->all(), [
            // 'date' => 'date_format:Y-m-d H:i',
            'arsip' => 'required|mimetypes:application/zip'
        ])->validate();

        $id = $request->get('id');

        $arsip = Arsip::find($id);
        $arsip->arsip_datetime = $request->get('date');
        $rek_id = $arsip->rek_id;

        if ($request->file('arsip_file')) {
            $dbfile = $arsip->arsip_file;
            if ($dbfile && file_exists(storage_path("app/public/$dbfile"))) {
                \Storage::delete("public/$dbfile");
            }
            $dir = "Arsip_Tahunan/$rek_id/Arsip/";
            $file = $arsip->rek_id . '_' . str_replace(' ', '_', $arsip->created_at) . "_arsip.zip";

            $request->file('arsip_file')->storeAs("public/$dir", $file);
            $arsip->arsip_file =  $dir . $file;
        }
        $arsip->save();

        return redirect()->route('super.rekmed.arsip.edit', ['rek_id' => $rek_id, 'id' => $id])->with('status', "Berhasil Mengedit Arsip $arsip->created_at");
    }


    //destroy
    //destroy rekmed
    public function destroy_rekmed($rek_id)
    {
        $rekmed = Rekmed::findOrFail($rek_id);

        \Storage::deleteDirectory("public/Rekmed/$rek_id/");

        $ctg = ['igd', 'nicu', 'poli', 'ri'];

        foreach ($ctg as $c) {
            $logs = Log::where('ctg', $c)->where('rek_id', $rek_id)->get();
            foreach ($logs as $log) {
                $log->id_ctg =  NULL;
                $log->save();
            }
        }

        $rekmed->delete();
        return redirect()->route('super.rekmed');
    }

    public function destroy_anak($ra_id)
    {
        $anak = RekmedAnak::findOrFail($ra_id);
        $rek_id = $anak->rek_id;
        $anak->delete();
        return redirect()->route('super.rekmed.edit-anak', ['rek_id' => $rek_id]);
    }

    //destroy ctg
    public function destroy_ctg($id, $ctg)
    {
        switch ($ctg) {
            case 'igd':
                $db = Igd::findOrFail($id);
                $ctgdb = 'IGD';
                break;

            case 'nicu':
                $db = Nicu::findOrFail($id);
                $ctgdb = 'NICU';
                break;

            case 'poli':
                $db = Poli::findOrFail($id);
                $ctgdb = 'POLI';
                break;

            case 'ri':
                $db = RawatInap::findOrFail($id);
                $ctgdb = 'Rawat_Inap';
                break;

            default:
                break;
        }

        $log = Log::where('ctg', $ctg)->where('id_ctg', $id)->first();
        $log->id_ctg =  NULL;
        $log->save();

        $rek_id = $db->rek_id;
        $dir = str_replace(' ', '_', $db->created_at);
        \Storage::deleteDirectory("public/Rekmed/$rek_id/$ctgdb/$dir");

        $db->delete();

        return redirect()->route("super.rekmed.show.$ctg", ['rek_id' => $rek_id]);
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

    //destroy arsip tahunan
    public function destroy_arsip_tahunan($id)
    {
        $arsip = Arsip::findOrFail($id);
        $rek_id = $arsip->rek_id;

        if (file_exists(storage_path('app/public/' . $arsip->arsip_file))) {
            \Storage::delete('public/' . $arsip->arsip_file);
        }
        $arsip->delete();

        return redirect()->route('super.show.arsip', ['rek_id' => $rek_id]);
    }
}
