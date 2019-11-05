<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Rekmed;

class AdminController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->get('search');
        if ($search) {
            $find = Rekmed::where('rek_id', 'LIKE', $search)->orWhere('rek_name', 'LIKE', "%$search%")->get();
        } else {
            $find = NULL;
        }
        return view('admin.index', ['find' => $find]);
    }

    public function create_rek(Request $request)
    {
        $id = $request->get('id');
        $id = strtoupper($id);
        return view('admin.create', ['id' => $id]);
    }

    public function store_rek(Request $request)
    {
        $rek_id = $request->get('rek_id');
        $name = 'agung';

        $rekmed = new Rekmed;
        $rekmed->rek_id = $rek_id;
        $rekmed->rek_name = $request->get('rek_name');
        $rekmed->u_id = $request->get('u_id');
        $rekmed->save();

        return redirect()->route('admin.upload.igd', ['rek_id'=>$rek_id]);
    }

    public function upload_igd($rek_id)
    {
        return view('admin.upload', ['rek_id'=>$rek_id]);
    }

    public function store_igd(Request $request)
    {
        
    }

    public function edit_igd()
    {
        
    }

    public function update_igd()
    {

    }

    public function show_igd()
    {

    }

}
