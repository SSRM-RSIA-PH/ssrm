<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use \App\Rekmed;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            if (Gate::allows('admin')) return $next($request);
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
        
        return view('admin.index', ['find' => $find]);
    }

    public function create(Request $request)
    {
        $id = $request->get('id');
        $id = strtoupper($id);
        return view('admin.create', ['id' => $id]);
    }

    public function store(Request $request)
    {
        $rek_id = strtoupper($request->get('rek_id'));
        
        $rekmed = new Rekmed;
        $rekmed->rek_id = $rek_id;
        $rekmed->rek_name = $request->get('rek_name');
        $rekmed->u_id = $request->get('u_id');
        $rekmed->save();

        return redirect()->route('admin.create.rek')->with('status', $rek_id);
    }

    public function show($rek_id)
    {
        $rekmed = Rekmed::findOrFail($rek_id);
        return view('admin.show', ['rekmed'=>$rekmed]);
    }

}
