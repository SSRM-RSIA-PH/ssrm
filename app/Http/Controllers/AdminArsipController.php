<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use \App\Arsip;

class AdminArsipController extends Controller
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
        return view('admin.arsip.create', ['rek_id' => $rek_id]);
    }

    public function store(Request $request)
    {
        \Validator::make($request->all(), [
            'arsip' => 'required|mimetypes:application/zip'
        ])->validate();

        $rek_id = $request->get('rek_id');

        $arsip = new Arsip;
        $arsip->u_id = $request->user()->id;
        $arsip->rek_id = $request->get('rek_id');
        $arsip->save();

        if ($request->file('arsip')) {
            $dir = "Rekmed/$rek_id/Arsip/";
            $file = $arsip->created_at . "_arsip.zip";

            $request->file('arsip')->storeAs("public/$dir", $file);
            $arsip->arsip_file =  $dir . $file;
            $arsip->save();
        }

        return redirect()->route('admin.create.arsip', ['rek_id'=>$rek_id])->with('status', 'yey');
    }
}
