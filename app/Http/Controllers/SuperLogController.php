<?php

namespace App\Http\Controllers;

use App\Log;
use App\Igd;
use App\Nicu;
use App\Poli;
use App\RawatInap;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class SuperLogController extends Controller
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
        $user = $request->get('user');
        $d_from = $request->get('d_from');
        $d_to = $request->get('d_to');

        if ($user) {
            if ($d_from && $d_to) {
                $logs = Log::whereBetween('created_at', [$d_from, $d_to])
                ->where('log_user', 'LIKE', "%$user%")
                ->orderBy('created_at', 'DESC')
                ->paginate(10);
            } else {
                $logs = Log::where('log_user', 'LIKE', "%$user%")->orderBy('created_at', 'DESC')->paginate(10);
            }
        } else {
            $logs = Log::orderBy('created_at', 'DESC')->paginate(10);
        }

        return view('super.log', ['logs' => $logs]);
    }


    //detail file
    public function detail_igd($rek_id, $id)
    {
        $data = Igd::findOrFail($id);
        return view('super.log-detail.igd', [
            'igd' => $data,
            'rek_id' => $rek_id
        ]);
    }

    public function detail_nicu($rek_id, $id)
    {
        $data = Nicu::findOrFail($id);
        return view('super.log-detail.nicu', [
            'nicu' => $data,
            'rek_id' => $rek_id
        ]);
    }

    public function detail_poli($rek_id, $id)
    {
        $data = Poli::findOrFail($id);
        return view('super.log-detail.poli', [
            'poli' => $data,
            'rek_id' => $rek_id
        ]);
    }

    public function detail_ri($rek_id, $id)
    {
        $data = RawatInap::findOrFail($id);
        return view('super.log-detail.ri', [
            'ri' => $data,
            'rek_id' => $rek_id
        ]);
    }
}
